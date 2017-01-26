<?php

/**
 * Class Model_Notice
 */
class Model_Notice extends Kohana_Model
{
	const NOTICES_MARKET_LIMIT = 12;

	const NOTICES_USER_LIMIT = 5;

    const NOTICE_PARAM_FACILITIES = 'facilities';

    const NOTICE_PARAM_SPECIFICS = 'specifics';

    public $noticeParams = [
        self::NOTICE_PARAM_FACILITIES => 'Удобства',
        self::NOTICE_PARAM_SPECIFICS => 'Особенности'
    ];

	public function __construct() {
	    DB::query(Database::UPDATE,"SET time_zone = '+10:00'")->execute();
    }

    /**
     * @param array $params
     *
     * @return int
     */
	public function setNotice($params = [])
	{
	    $noticeId = (int)Arr::get($params,'redact_notice');

        DB::update('notice')
            ->set([
                'type' => Arr::get($params, 'type'),
                'area' => Arr::get($params, 'area'),
                'name' => Arr::get($params, 'name', ''),
                'address' => Arr::get($params, 'address'),
                'floor' => Arr::get($params, 'floor'),
                'longitude' => Arr::get($params, 'longitude'),
                'latitude' => Arr::get($params, 'latitude'),
                'phone' => Arr::get($params, 'phone'),
                'price' => Arr::get($params, 'price', 0),
                'description' => Arr::get($params, 'description', ''),
                'updated_at' => DB::expr('NOW()'),
            ])
            ->where('id', '=', $noticeId)
            ->execute()
        ;

        foreach (Arr::get($params, 'param', []) as $paramId) {
            $this->addNoticeParams($noticeId, $paramId);
        }

        return $noticeId;
	}

    /**
     * @param string $name
     * @param string $type
     */
	public function addParam($type, $name)
	{
		DB::insert('params', ['name', 'type'])
            ->values ([$name, $type])
			->execute()
        ;
	}

    /**
     * @param int $id
     */
	public function removeParam($id)
	{
		DB::delete('params')
            ->where('id', '=', $id)
			->execute()
        ;
	}

    /**
     * @param int $noticeId
     * @param int $paramId
     */
	public function addNoticeParams($noticeId, $paramId)
	{
	    if(in_array($paramId, $this->getNoticeParams($noticeId))) {
	        return;
        }

		DB::insert('notice__params', ['notice_id', 'param_id'])
            ->values ([$noticeId, $paramId])
			->execute()
        ;
	}

    /**
     * @param int $id
     * @return array
     */
	public function getNoticeParams($id)
	{
		return DB::select()
            ->from(['notice__params', 'np'])
            ->join(['params', 'p'])
            ->on('p.id', '=', 'np.param_id')
            ->where('notice_id', '=', $id)
			->execute()
			->as_array('id', 'param_id')
        ;
	}

    /**
     * @param int $id
     * @return array
     */
	public function getNoticeParamsWithName($id)
	{
		return DB::select()
            ->from(['notice__params', 'np'])
            ->join(['params', 'p'])
            ->on('p.id', '=', 'np.param_id')
            ->where('notice_id', '=', $id)
			->execute()
			->as_array('id', 'name')
        ;
	}

    /**
     * @param int $noticeId
     * @param int $paramId
     */
    public function removeNoticeParams($noticeId, $paramId)
    {
        DB::delete('notice__params')
            ->where('notice_id', '=', $noticeId)
            ->and_where('param_id', '=', $paramId)
            ->execute()
        ;
    }

    /**
     * @param $id
     */
    public function removeNoticeImg($id)
    {
        DB::update('notice_img')
            ->set([
                'status_id' => 0,
                'updated_at' => DB::expr('NOW()')
            ])
            ->where('id', '=', $id)
            ->execute()
        ;
    }

    /**
     * @param int $id
     */
	public function removeNotice($id)
	{
		DB::update('notice')
            ->set(['status_id' => 0])
            ->where('id', '=', $id)
			->execute()
        ;
	}

    /**
     * @param int $id
     * @param int $userId
     */
	public function removeUserNotice($id, $userId = null)
	{
        $userId = $userId === null ? Auth::instance()->get_user()->id : $userId;

		DB::update('notice')
            ->set(['status_id' => 0])
            ->where('id', '=', $id)
            ->and_where('user_id', '=', $userId)
			->execute()
        ;
	}

	public function findLastSeeItems()
	{
		$data = [];

		$views = DB::select()
			->from('notice__views')
			->limit(4)
			->order_by('id', 'DESC')
			->group_by('notice_id')
			->execute()
			->as_array()
		;

		foreach ($views as $view) {
			$noticeData = $this->getNotice(['id' =>$view['notice_id']]);
			$data[] = Arr::get($noticeData, 0, []);
		}

		return $data;
	}
	
	public function setNoticeView($id)
	{
		$ip = Arr::get($_SERVER, 'REMOTE_ADDR', '');

		$lastView = DB::select()
			->from('notice__views')
			->limit(1)
			->order_by('id', 'DESC')
			->execute()
			->current()
		;
		
		$lastViewIp = Arr::get($lastView, 'ip', '');
		$lastViewNoticeId = Arr::get($lastView, 'notice_id', '');

		if ($lastViewIp !== $ip || (int)$lastViewNoticeId !== (int)$id) {
			DB::insert('notice__views', ['notice_id', 'ip', 'date'])
				->values([$id, $ip, DB::expr('NOW()')])
				->execute()
			;
		}
	}

	/**
	 * @param int $id
	 *
	 * @return array
	 */
	public function findById($id)
	{
		$result = DB::select(
			'n.*',
			[DB::select('t.name')->from(['notice__type', 't'])->where('t.id', '=', DB::expr('n.type')), 'type_name'],
			[DB::select('t.room_count')->from(['notice__type', 't'])->where('t.id', '=', DB::expr('n.type')), 'room_count']
		)
			->from(['notice', 'n'])
			->where('n.id', '=', $id)
			->and_where('n.status_id', '=', 1)
			->limit(1)
			->execute()
			->current()
		;

		return !$result ? [] : $result;
	}

	/**
	 * @param int $id
	 *
	 * @return array
	 */
	public function findByIdAndUser($id, $userId)
	{
		$result = DB::select(
			'n.*',
			[DB::select('t.name')->from(['notice__type', 't'])->where('t.id', '=', DB::expr('n.type')), 'type_name'],
			[DB::select('t.room_count')->from(['notice__type', 't'])->where('t.id', '=', DB::expr('n.type')), 'room_count']
		)
			->from(['notice', 'n'])
			->where('n.id', '=', $id)
			->and_where('n.status_id', '=', 1)
			->and_where('n.user_id', '=', $userId)
			->limit(1)
			->execute()
			->current()
		;

		return !$result ? [] : $result;
	}

	/**
	 * @param int $typeId
	 * @param int $ignoreId
	 *
	 * @return array
	 */
	public function findLastAddedByType($typeId, $ignoreId)
	{
		return DB::select(
			'n.*',
			[DB::select('t.name')->from(['notice__type', 't'])->where('t.id', '=', DB::expr('n.type')), 'type_name'],
			[DB::select('t.room_count')->from(['notice__type', 't'])->where('t.id', '=', DB::expr('n.type')), 'room_count']
		)
			->from(['notice', 'n'])
			->where('n.type', '=', $typeId)
			->and_where('n.id', '!=', $ignoreId)
			->and_where('n.status_id', '=', 1)
			->order_by('n.created_at', 'desc')
			->limit(3)
			->execute()
			->as_array()
		;
	}

	/**
	 * @param int $limit
	 *
	 * @return array
	 */
	public function findPopular($limit = 4)
	{
		$data = [];

		$views = DB::select()
			->from('notice__views')
			->limit($limit)
			->order_by('id', 'DESC')
			->group_by('notice_id')
			->execute()
			->as_array()
		;

		foreach ($views as $view) {
			$noticeData = $this->findById($view['notice_id']);

			if (!empty($noticeData)) {
				$data[] = $noticeData;
			}
		}

		return $data;
	}

	/**
     * @param bool $fullData
     *
	 * @return array
	 */
	public function findAllTypes($fullData = false)
	{
		$query = DB::select()
			->from('notice__type')
			->order_by('id', 'ASC')
			->execute()
        ;

        return $fullData ? $query->as_array() : $query->as_array('id', 'name');
	}

	/**
	 * @param $id
	 *
	 * @return array
	 */
	public function getNoticeImg($id)
	{
		return DB::select()
			->from('notice_img')
			->where('notice_id', '=', $id)
			->and_where('status_id', '=', 1)
			->execute()
			->as_array()
			;
	}


	/**
	 * @param array $query
	 * @return array
	 */
	public function searchNotices($query = [])
	{
		$page = Arr::get($query, 'page', 1);
		$limit = Arr::get($query, 'limit', 30);
		$type = Arr::get($query, 'type', []);
		$param = Arr::get($query, 'param', []);
		$priceFrom = Arr::get($query, 'price_from', 0);
		$priceTo = Arr::get($query, 'price_to', 0);
		$areaFrom = Arr::get($query, 'area_from', 0);
		$areaTo = Arr::get($query, 'area_to', 0);
		$order = Arr::get($query, 'order');

		$notices = [];

		$querySql = DB::select('n.*', ['t.name', 'type_name'], 't.room_count')
			->from(['notice', 'n'])
			->join(['notice__type', 't'], !empty($type) ? 'inner' : 'left')
			->on('t.id', '=', 'n.type')
			->where('n.status_id', '=', 1)
			->and_where('n.price', '>=', $priceFrom)
		;

		$querySql = !empty($type) ? $querySql->and_where('t.id', 'IN', $type) : $querySql;
		$querySql = !empty($param) ? $querySql->and_where('n.id', 'IN', DB::select('p.notice_id')->from(['notice__params', 'p'])->where('p.id', 'IN', $param)) : $querySql;
		$querySql = !empty($priceTo) ? $querySql->and_where('n.price', '<=', $priceTo) : $querySql;
		$querySql = !empty($areaFrom) ? $querySql->and_where('n.area', '>=', $areaFrom) : $querySql;
		$querySql = !empty($areaTo) ? $querySql->and_where('n.area', '<=', $areaTo) : $querySql;

		$queryCount = clone $querySql;

		$querySql = $querySql
			->offset((($page - 1) * $limit))
			->limit(($page * $limit))
		;

		switch ($order) {
			case 'priceUp':
				$querySql = $querySql->order_by('n.price', 'ASC');

				break;
			case 'priceDown':
				$querySql = $querySql->order_by('n.price', 'DESC');

				break;
			default:
				$querySql = $querySql->order_by('n.id', 'DESC');
		}

		$res = $querySql
			->execute()
			->as_array()
		;

		$i = 0;
		$rowsCount = $queryCount->execute()->count();

		foreach ($res as $row) {
			$notices[$i] = $row;
			$notices[$i]['imgs'] = $this->getNoticeImg($row['id']);
			$notices[$i]['main_thumb_img_src'] = $this->getNoticeMainThumbImg($row['id']);
			$notices[$i]['paginationCount'] = ceil($rowsCount / count($res));
			$notices[$i]['count'] = $rowsCount;

			$i++;
		}

		return $notices;
	}

	public function findUserNotices($userId = null)
    {
        $userId = $userId === null ? Auth::instance()->get_user()->id : $userId;

        return DB::select()
            ->from('notice')
            ->where('user_id', '=', $userId)
            ->and_where('status_id', '=', 1)
            ->execute()
            ->as_array()
        ;
    }

	public function loadNoticeImg($filesGlobal, $noticeId)
	{
		$filesData = [];

		foreach ($filesGlobal['imgname']['name'] as $key => $data) {
			$filesData[$key]['name'] = $filesGlobal['imgname']['name'][$key];
			$filesData[$key]['type'] = $filesGlobal['imgname']['type'][$key];
			$filesData[$key]['tmp_name'] = $filesGlobal['imgname']['tmp_name'][$key];
			$filesData[$key]['error'] = $filesGlobal['imgname']['error'][$key];
			$filesData[$key]['size'] = $filesGlobal['imgname']['size'][$key];
		}

		foreach ($filesData as $files) {
			$res = DB::insert('notice_img', ['notice_id'])
				->values([$noticeId])
				->execute()
			;

			$newId = $res[0];
			$imageName = preg_replace("/[^0-9a-z.]+/i", "0", Arr::get($files,'name',''));
			$file_name = 'public/img/original/'.$newId.'_'.$imageName;
			if (copy($files['tmp_name'], $file_name))	{
				$image=Image::factory($file_name);
				$image->resize(500, NULL);
				$image->save($file_name,100);
				$thumb_file_name = 'public/img/thumb/'.$newId.'_'.$imageName;

				if (copy($files['tmp_name'], $thumb_file_name))	{
					$thumb_image=Image::factory($thumb_file_name);
					$thumb_image->resize(300, NULL);
					$thumb_image->save($thumb_file_name,100);

					DB::update('notice_img')
						->set(['src' => $newId.'_'.$imageName, 'status_id' => 1])
						->where('id', '=', $newId)
						->execute();
				}
			}
		}
	}

	/**
	 * @param array $params
	 *
	 * @return int
	 */
	public function addNotice($params = [])
	{
		$res = DB::insert('notice', [
				'type',
				'area',
				'address',
				'floor',
				'longitude',
				'latitude',
				'name',
				'price',
				'description',
				'phone',
                'user_id',
				'created_at',
			])
			->values([
				Arr::get($params, 'type'),
				Arr::get($params, 'area', 0),
				Arr::get($params, 'address'),
				Arr::get($params, 'floor'),
				Arr::get($params, 'longitude'),
				Arr::get($params, 'latitude'),
				Arr::get($params, 'name', ''),
				Arr::get($params, 'price', 0),
				Arr::get($params, 'description', ''),
				Arr::get($params, 'phone', ''),
                Auth::instance()->get_user()->id,
				DB::expr('NOW()')
			])
			->execute()
		;

		$noticeId = $res[0];

		DB::update('notice')
			->set(['sort' => $noticeId])
			->where('id', '=', $noticeId)
			->execute()
		;

        foreach (Arr::get($params, 'param', []) as $paramId) {
            $this->addNoticeParams($noticeId, $paramId);
        }

		return $noticeId;
	}

	/**
	 * @param int $noticeId
	 * @return string
	 */
	public function getNoticeMainOriginalImg($noticeId)
	{
		$noticeImgs = $this->getNoticeImg($noticeId);

		return count($noticeImgs) === 0 ? '/public/img/original/nopic.jpg' : '/public/img/original/' . $noticeImgs[0]['src'];
	}

	/**
	 * @param int $noticeId
	 * @return string
	 */
	public function getNoticeMainThumbImg($noticeId)
	{
		$noticeImgs = $this->getNoticeImg($noticeId);

		return count($noticeImgs) === 0 ? '/public/img/thumb/nopic.jpg' : '/public/img/thumb/' . $noticeImgs[0]['src'];
	}

    /**
     * @param int $page
     * @param int $limit
     * @return array
     */
    public function getList($page, $limit)
    {
        return DB::select('n.*', ['t.name', 'type_name'])
            ->from(['notice', 'n'])
            ->join(['notice__type', 't'], 'left')
            ->on('t.id', '=', 'n.type')
            ->where('n.status_id', '=', 1)
            ->offset((($page - 1) * $limit))
            ->limit(($page * $limit))
            ->order_by('n.id', 'DESC')
            ->execute()
            ->as_array()
            ;
    }

    /**
     * @param int $limit
     *
     * @return int
     */
    public function getListPaginationCount($limit)
    {
        $count = DB::select()
            ->from('notice')
            ->where('status_id', '=', 1)
            ->execute()
            ->count()
        ;

        return ceil($count / $limit);
    }

    /**
     * @param array $query
     *
     * @return array
     */
    public function findSearchCardsNotices($query)
    {
        $searchCardsNotices = [];

        $query['limit'] = 6;
        $cardsInRowLimit = 3;

        $searchNotices = $this->searchNotices($query);

        $key = 0;
        $i = 0;

        foreach ($searchNotices as $notice) {
            $searchCardsNotices[$key][$i] = $notice;

            $i++;

            if ($i >= $cardsInRowLimit){
                $key++;
                $i = 0;
            }
        }

        return $searchCardsNotices;
    }

    public function findAllParams()
    {
        return DB::select('p.*', [DB::expr("IF(p.type = :facilities_param, :facilities_param_description, IF(p.type = :specifics_param, :specifics_param_description, ''))"), 'type_name'])
            ->from(['params', 'p'])
            ->parameters([
                ':facilities_param' => self::NOTICE_PARAM_FACILITIES,
                ':facilities_param_description' => $this->noticeParams[self::NOTICE_PARAM_FACILITIES],
                ':specifics_param' => self::NOTICE_PARAM_SPECIFICS,
                ':specifics_param_description' => $this->noticeParams[self::NOTICE_PARAM_SPECIFICS]
            ])
            ->order_by('p.type', 'ASC')
            ->execute()
            ->as_array()
        ;
    }

    /**
     * @param $noticeId
     */
    public function addToLikedNotices($noticeId)
    {
        $userId = Auth::instance()->get_user()->id;

        if(!$this->findLikedNoticeByNoticeAndUser($noticeId, $userId)) {
            DB::insert('notice__liked', ['notice_id', 'user_id', 'created_at'])
                ->values([$noticeId, $userId, DB::expr('NOW()')])
                ->execute();
        }
    }

    /**
     * @param int $noticeId
     * @param int $userId
     */
    public function removeFromLikedNotices($noticeId, $userId = null)
    {
        $userId = $userId === null ? Auth::instance()->get_user()->id : $userId;

        DB::delete('notice__liked')
            ->where('notice_id', '=', $noticeId)
            ->and_where('user_id', '=', $userId)
            ->execute();
    }

    /**
     * @param $noticeId
     * @param $userId
     *
     * @return mixed
     */
    public function findLikedNoticeByNoticeAndUser($noticeId, $userId)
    {
        return DB::select()
            ->from('notice__liked')
            ->where('notice_id', '=', $noticeId)
            ->and_where('user_id', '=', $userId)
            ->limit(1)
            ->execute()
            ->current()
        ;
    }

    /**
     * @param $userId
     *
     * @return mixed
     */
    public function findUserLikedNotices($userId = null)
    {
        $userId = $userId === null ? Auth::instance()->get_user()->id : $userId;

        return DB::select(['n.id', 'notice_id'] , 'n.name')
            ->from(['notice__liked', 'nl'])
            ->join(['notice', 'n'])
            ->on('n.id', '=', 'nl.notice_id')
            ->where('nl.user_id', '=', $userId)
            ->execute()
            ->as_array()
        ;
    }
}
?>