<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Controller
{
    /** @var $noticeModel Model_Notice */
    private $noticeModel;

    /** @var $cartModel Model_Cart */
    private $cartModel;

    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);

        $this->noticeModel = Model::factory('Notice');
        $this->cartModel = Model::factory('Cart');
    }

    public function action_add_to_cart()
	{
        $this->cartModel->addToCart($this->request->post('noticeId'));
		$this->response->body('ok');
	}

    public function action_set_cart_num()
	{
        $cartId = (int)$this->request->post('cartId');
        $value = (int)$this->request->post('value');

        $value = preg_replace('/[\D]+/', '', $value);

        $this->cartModel->setCartNum($cartId, $value < 0 ? 0 : $value);

		$this->response->body($value);
	}

    public function action_remove_from_cart()
	{
		$this->response->body($this->cartModel->removeCartPosition((int)$this->request->post('cartId')));
	}

    public function action_get_cart_num()
	{
		$this->response->body($this->cartModel->getCartNum());
	}

    public function action_add_review()
	{
        /** @var $adminModel Model_Admin */
        $adminModel = Model::factory('Admin');

		$this->response->body($adminModel->addReview($this->request->post()));
	}

	public function action_send_order()
    {
        $name = (string)$this->request->post('name');
        $phone = (string)$this->request->post('phone');
        $address = (string)$this->request->post('address');
        $email = (string)$this->request->post('email');

        $this->response->body($this->cartModel->sendOrder($name, $phone, $address, $email));
    }

    public function action_check_isset_username()
    {
        /** @var $adminModel Model_Admin */
        $adminModel = Model::factory('Admin');

        $this->response->body(!$adminModel->findUserByUsername($this->request->post('username')) ? 0 : 1);
    }

    public function action_check_isset_email()
    {
        /** @var $adminModel Model_Admin */
        $adminModel = Model::factory('Admin');

        $this->response->body(!$adminModel->findUserByEmail($this->request->post('email')) ? 0 : 1);
    }

    public function action_registration()
    {
        /** @var $adminModel Model_Admin */
        $adminModel = Model::factory('Admin');

        $adminModel->registerUser($this->request->post('username'), $this->request->post('email'), $this->request->post('password'));
    }

    public function action_find_address_coords()
    {
        /** @var $adminModel Model_Admin */
        $adminModel = Model::factory('Admin');

        $this->response->body($adminModel->findCoords($this->request->query('address')));
    }

    public function action_load_images()
    {
        $filename=Arr::get($_FILES, 'imgname', []);

        if (!empty($filename)) {
            $this->noticeModel->loadNoticeImg($_FILES, $this->request->post('id'));
        }

        $this->response->body(json_encode(['result' => 'success']));
    }

    public function action_add_notice()
    {
        $this->response->body(json_encode(['id' => $this->noticeModel->addNotice($this->request->post())]));
    }


    public function action_set_notice()
    {
        $this->response->body(json_encode(['id' => $this->noticeModel->setNotice($this->request->post())]));
    }

    public function action_remove_notice_img()
    {
        $this->noticeModel->removeNoticeImg($this->request->post('id'));

        $this->response->body(json_encode(['result' =>'success']));
    }

    public function action_find_search_cards_notices()
    {
        $this->response->body(json_encode(['result' => $this->noticeModel->findSearchCardsNotices($this->request->post())]));
    }

    public function action_add_to_liked_notices()
    {
        $this->response->body(json_encode(['result' => $this->noticeModel->addToLikedNotices((int)$this->request->post('id'))]));
    }

    public function action_remove_param()
    {
        $this->response->body(json_encode(['result' => $this->noticeModel->removeParam((int)$this->request->post('id'))]));
    }

    public function action_get_owner_phone()
    {
        $this->response->body(Arr::get($this->noticeModel->findById((int)$this->request->post('id')), 'phone'));
    }
}
