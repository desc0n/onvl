<?php

/**
 * Class Model_Content
 */
class Model_Content extends Kohana_Model
{
    /**
     * @return View
     */
    public function getBaseTemplate()
    {
        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        return View::factory('template')
            ->set('menu', $this->getMenu())
            ->set('categories', $this->getCategory())
            ->set('noticeTypes', $noticeModel->findAllTypes())
            ;
    }
    
    /**
     * @param null|int $mid
     * @param null|int $id
     * 
     * @return array
     */
    public function getMenu($mid = null, $id = null)
    {
        if ($mid !== null && $id === null) {
            return DB::select(
                    'm.*' , 
                    ['p.title', 'name'],
                    'p.slug'
                )
                ->from(['menu', 'm'])
                ->join(['pages', 'p'])
                ->on('p.id', '=', 'm.page_id')
                ->where('m.parent_id', '=', $mid)
                ->and_where('m.status_id', '=', 1)
                ->execute()
                ->as_array()
            ;
        } elseif ($id !== null) {
            return DB::select(
                    'm.*' ,
                    ['p.title', 'name'],
                    'p.slug'
                )
                ->from(['menu', 'm'])
                ->join(['pages', 'p'])
                ->on('p.id', '=', 'm.page_id')
                ->where('m.id', '=', $id)
                ->execute()
                ->as_array()
            ;
        } else {
            return DB::select(
                    'm.*' ,
                    ['p.title', 'name'],
                    'p.slug'
                )
                ->from(['menu', 'm'])
                ->join(['pages', 'p'])
                ->on('p.id', '=', 'm.page_id')
                ->where('m.parent_id', 'IS', null)
                ->and_where('m.status_id', '=', 1)
                ->execute()
                ->as_array()
            ;
        }
    }

    /**
     * @param null|int $cid
     * @param null|int $id
     * 
     * @return array
     */
    public function getCategory($cid = null, $id = null)
    {
        if ($cid !== null && $id === null) {
            return DB::select()
                ->from('category')
                ->where('parent_id', '=', $cid)
                ->execute()
                ->as_array()
            ;
        } elseif ($id !== null) {
            return DB::select()
                ->from('category')
                ->where('id', '=', $id)
                ->limit(1)
                ->execute()
                ->current()
            ;
        } else {
            return DB::select()
                ->from('category')
                ->where('parent_id', 'IS', NULL)
                ->execute()
                ->as_array()
            ;
        }
    }

    /**
     * @return array
     */
    public function getPages()
    {
        return DB::select('p.*')
            ->from(['pages', 'p'])
            ->join(['menu', 'm'])
            ->on('m.page_id', '=', 'p.id')
            ->where('m.status_id', '=', 1)
            ->execute()
            ->as_array()
        ;
    }

    public function getPage($params = [])
    {
        $id = Arr::get($params, 'id', 0);

        return DB::select()
            ->from('pages')
            ->where('id', '=', $id)
            ->limit(1)
            ->execute()
            ->current()
        ;
    }

    /**
     * @param string $slug
     * 
     * @return false|array
     */
    public function findPageBySlug($slug = '')
    {
        return DB::select()
            ->from('pages')
            ->where('slug', '=', $slug)
            ->limit(1)
            ->execute()
            ->current()
        ;
    }

    /**
     * @param int $id
     *
     * @return false|array
     */
    public function findPageById($id)
    {
        return DB::select()
            ->from('pages')
            ->where('id', '=', $id)
            ->limit(1)
            ->execute()
            ->current()
            ;
    }

    public function findAllDistricts()
    {
        return DB::select()
            ->from('districts')
            ->execute()
            ->as_array('id', 'name')
            ;
    }

    public function findAllStreets()
    {
        return DB::select()
            ->from('streets')
            ->execute()
            ->as_array(null, 'name')
            ;
    }

    public function getRuDate(DateTime $dateTime)
    {
        $ruMonths = [
            1 => 'января',
            2 => 'февраля',
            3 => 'марта',
            4 => 'апреля',
            5 => 'мая',
            6 => 'июня',
            7 => 'июля',
            8 => 'августа',
            9 => 'сентября',
            10 => 'октября',
            11 => 'ноября',
            12 => 'декабря'
        ];

        return (int)$dateTime->format('d') . ' ' . $ruMonths[(int)$dateTime->format('m')] . ' ' . $dateTime->format('Y');
    }
}