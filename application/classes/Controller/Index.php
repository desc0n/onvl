<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Base
{
    public function action_index()
    {
        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        View::set_global('title', 'Главная');
        View::set_global('rootPage', 'main');

        $template = $contentModel->getBaseTemplate();

        $template->content = View::factory('index')
            ->set('get', $_GET)
            ->set('post', $_POST)
            ->set('districts', $contentModel->findAllDistricts())
        ;

        $this->response->body($template);
    }

    public function action_page()
    {
        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        $slug = $this->request->param('slug');
        $pageData = $contentModel->findPageBySlug($slug);

        View::set_global('title', Arr::get($pageData, 'title'));
        View::set_global('rootPage', $slug);

        $template = $contentModel->getBaseTemplate();

        $template->content = View::factory('page')
            ->set('pageData', $pageData)
            ->set('get', $_GET)
        ;

        $this->response->body($template);
    }

    /**
     * @param array $query
     * @return array
     */
    public function searchNotices($query = [])
    {
        $page = Arr::get($query, 'page', 1);
        $limit = Arr::get($query, 'limit', 30);
        $district = Arr::get($query, 'district');
        $type = Arr::get($query, 'type');
        $priceFrom = Arr::get($query, 'price_from', 0);
        $priceTo = Arr::get($query, 'price_to', 0);
        $order = Arr::get($query, 'order');

        $notices = [];

        $query = DB::select('n.*', ['d.name', 'district_name'], ['t.name', 'type_name'])
            ->from(['notice', 'n'])
            ->join(['districts', 'd'], 'left')
            ->on('d.id', '=', 'n.district')
            ->join(['notice__type', 't'], 'left')
            ->on('t.id', '=', 'n.type')
            ->where('n.status_id', '=', 1)
            ->and_where('n.price', '>=', $priceFrom)
        ;

        $query = !empty($district) ? $query->and_where('d.id', '=', $district) : $query;
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

    public function action_search()
    {
        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        View::set_global('title', 'Поиск');
        View::set_global('rootPage', 'search');

        $template = $contentModel->getBaseTemplate();

        $content = View::factory('search')
            ->set('districts', $contentModel->findAllDistricts())
            ->set('types', $noticeModel->findAllTypes())
            ->set('searchedNotices', $noticeModel->searchNotices($this->request->query()))
            ->set('popularNotices', $noticeModel->findPopular())
            ->set('get', $this->request->query())
        ;

        $template
            ->set('content', $content)
            ->set('page', 'search')
        ;

        $this->response->body($template);
    }

	public function action_cart()
	{
        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        /** @var $cartModel Model_Cart */
        $cartModel = Model::factory('Cart');

        View::set_global('title', 'Корзина');
        View::set_global('rootPage', 'cart');

        $template = $contentModel->getBaseTemplate();

		$template->content = View::factory('cart')
			->set('get', $_GET)
			->set('cart', $cartModel->getCart())
        ;

        $this->response->body($template);
	}

    public function action_reviews()
    {
        /**
         * @var $adminModel Model_Admin
         */
        $adminModel = Model::factory('Admin');

        View::set_global('title', 'Отзывы');

        $template = View::factory("template");

        $content = View::factory('reviews')
            ->set('reviewsData', $adminModel->findReviews());

        $template
            ->set('content', $content)
            ->set('page', 'reviews');
        $this->response->body($template);
    }
}