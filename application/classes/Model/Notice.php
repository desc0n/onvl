<?php

/**
 * Class Model_Notice
 */
class Model_Notice extends Kohana_Model
{
	const NOTICES_MARKET_LIMIT = 12;

	public function __construct() {
	    DB::query(Database::UPDATE,"SET time_zone = '+10:00'")->execute();
    }

	public function setNotice($params = [])
	{
		DB::update('notice')
        	->set([
        		'article' => ':article',
        		'name' => ':name',
				'price' => ':price',
				'description' => ':description',
				'short_description' => ':short_description',
				'status_id' => 1,
				'sort' => ':sort'
			])
			->where('id', '=', ':id')
			->parameters([
				':id' => Arr::get($params,'redactnotice'),
				':article' => Arr::get($params,'article',''),
				':name' => Arr::get($params,'name',''),
				':price' => Arr::get($params,'price',''),
				':description' => Arr::get($params,'description',''),
				':short_description' => Arr::get($params,'short_description',''),
				':sort' => Arr::get($params, 'sort', 1)
			])
			->execute()
		;
	}

	public function setNoticeParams($params = [])
	{
		$sql = "insert into `notice_params`
        (`notice_id`, `name`, `value`, `status_id`)
        values (:notice_id, :name, :value, 1)";
		DB::query(Database::UPDATE,$sql)
			->param(':notice_id', Arr::get($params,'newNoticeParam'))
			->param(':name', Arr::get($params,'newParamsName',''))
			->param(':value', Arr::get($params,'newParamsValue',''))
			->execute();
	}

	public function getNoticeParams($params = [])
	{
		$sql = "select * from `notice_params` where `notice_id` = :id and `status_id` = 1";
		return DB::query(Database::SELECT, $sql)
			->param(':id', Arr::get($params, 'id', 0))
			->execute()
			->as_array();
	}


    public function removeNoticeParams($params = [])
    {
        $sql = "update `notice_params` set `status_id` = 0 where `id` = :id";
        DB::query(Database::UPDATE,$sql)
            ->param(':id', Arr::get($params,'removeProductParam',0))
            ->execute();
    }

	public function removeNoticeImg($params = [])
	{
		$sql = "update `notice_img` set `status_id` = 0 where `id` = :id";
		DB::query(Database::UPDATE,$sql)
			->param(':id', Arr::get($params,'removeimg',0))
			->execute();
	}

	public function deleteNotice($params)
	{
		$sql = "update `notice` set `status_id` = 0 where `id` = :id";
		DB::query(Database::UPDATE,$sql)
			->param(':id', Arr::get($params,'id',0))
			->execute();
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
	 * @param int $typeId
	 *
	 * @return array
	 */
	public function findLastAddedByType($typeId)
	{
		return DB::select(
			'n.*',
			[DB::select('t.name')->from(['notice__type', 't'])->where('t.id', '=', DB::expr('n.type')), 'type_name'],
			[DB::select('t.room_count')->from(['notice__type', 't'])->where('t.id', '=', DB::expr('n.type')), 'room_count']
		)
			->from(['notice', 'n'])
			->where('n.type', '=', $typeId)
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
	 * @return array
	 */
	public function findAllTypes()
	{
		return DB::select()
			->from('notice__type')
			->order_by('id', 'ASC')
			->execute()
			->as_array('id', 'name')
			;
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
		$type = Arr::get($query, 'type');
		$priceFrom = Arr::get($query, 'price_from', 0);
		$priceTo = Arr::get($query, 'price_to', 0);
		$order = Arr::get($query, 'order');

		$notices = [];

		$query = DB::select('n.*', ['t.name', 'type_name'])
			->from(['notice', 'n'])
			->join(['notice__type', 't'], 'left')
			->on('t.id', '=', 'n.type')
			->where('n.status_id', '=', 1)
			->and_where('n.price', '>=', $priceFrom)
		;

		$query = !empty($type) ? $query->and_where('t.id', '=', $type) : $query;
		$query = !empty($priceTo) ? $query->and_where('n.price', '<=', $priceTo) : $query;

		$queryCount = clone $query;

		$query = $query
			->offset((($page - 1) * $limit))
			->limit(($page * $limit))
		;

		switch ($order) {
			case 'priceUp':
				$query = $query->order_by('n.price', 'ASC');

				break;
			case 'priceDown':
				$query = $query->order_by('n.price', 'DESC');

				break;
			default:
				$query = $query->order_by('n.id', 'DESC');
		}

		$res = $query
			->execute()
			->as_array()
		;

		$i = 0;
		$rowsCount = $queryCount->execute()->count();

		foreach ($res as $row) {
			$notices[$i] = $row;
			$notices[$i]['imgs'] = $this->getNoticeImg($row['id']);
			$notices[$i]['paginationCount'] = ceil($rowsCount / count($res));
			$notices[$i]['count'] = $rowsCount;

			$i++;
		}

		return $notices;
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

}
?>