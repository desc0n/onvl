<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Index extends Controller_Base
{
    public function action_index()
    {
        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        if (Auth::instance()->logged_in() && isset($_POST['logout'])) {
            Auth::instance()->logout();
            HTTP::redirect('/');
        }

        if (!Auth::instance()->logged_in() && isset($_POST['login'])) {
            Auth::instance()->login($this->request->post('username'), $this->request->post('password'),true);
            HTTP::redirect('/');
        }

        View::set_global('title', 'Главная');
        View::set_global('rootPage', 'main');

        $template = $contentModel->getBaseTemplate();

        $template->content = View::factory('index')
            ->set('get', $_GET)
            ->set('post', $_POST)
            ->set('districts', $contentModel->findAllDistricts())
            ->set('popularNotices', $noticeModel->findPopular())
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

    public function action_search()
    {
        $this->response->body($this->getSearchPage($this->request->query()));
    }

    public function action_arenda()
    {
        $query = $this->request->query();
        $slug = $this->request->param('slug');
        switch ($slug) {
            case 'skorosthyh-katerov':
                $query['type'] = 'speed_boat';
                break;
            case 'parusnyh-yaht':
                $query['type'] = 'sailing_yacht';
                break;
            case 'katamaranov':
                $query['type'] = 'catamaran';
                break;
            case 'progulochnyh-yaht':
                $query['type'] = 'pleasure_boat';
                break;
            case 'motornyh-yaht':
                $query['type'] = 'motor_yaht';
                break;
            case 'vip-yaht':
                $query['type'] = 'vip_yaht';
                break;
            case 'na-teplohode':
                $query['type'] = 'motor_ship';
                break;
        }
        $this->response->body($this->getSearchPage($query));
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

    private function getSearchPage($query)
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
            ->set('searchedNotices', $noticeModel->searchNotices($query))
            ->set('popularNotices', $noticeModel->findPopular())
            ->set('params', $noticeModel->findAllParams())
            ->set('get', $query)
        ;

        $template
            ->set('content', $content)
            ->set('page', 'search')
        ;

        return $template;
    }
}