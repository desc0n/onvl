<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends Controller
{
	public function action_add_to_cart()
	{
        /** @var $cartModel Model_Cart */
        $cartModel = Model::factory('Cart');

        $cartModel->addToCart($this->request->post('noticeId'));
		$this->response->body('ok');
	}

    public function action_set_cart_num()
	{
        /** @var $cartModel Model_Cart */
        $cartModel = Model::factory('Cart');

        $cartId = (int)$this->request->post('cartId');
        $value = (int)$this->request->post('value');

        $value = preg_replace('/[\D]+/', '', $value);

        $cartModel->setCartNum($cartId, $value < 0 ? 0 : $value);

		$this->response->body($value);
	}

    public function action_remove_from_cart()
	{
        /** @var $cartModel Model_Cart */
        $cartModel = Model::factory('Cart');

		$this->response->body($cartModel->removeCartPosition((int)$this->request->post('cartId')));
	}

    public function action_get_cart_num()
	{
        /** @var $cartModel Model_Cart */
        $cartModel = Model::factory('Cart');

		$this->response->body($cartModel->getCartNum());
	}

    public function action_add_review()
	{
        /** @var $adminModel Model_Admin */
        $adminModel = Model::factory('Admin');

		$this->response->body($adminModel->addReview($_POST));
	}

	public function action_send_order()
    {
        /** @var $cartModel Model_Cart */
        $cartModel = Model::factory('Cart');

        $name = (string)$this->request->post('name');
        $phone = (string)$this->request->post('phone');
        $address = (string)$this->request->post('address');
        $email = (string)$this->request->post('email');

        $this->response->body($cartModel->sendOrder($name, $phone, $address, $email));
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
        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        $filename=Arr::get($_FILES, 'imgname', []);

        if (!empty($filename)) {
            $noticeModel->loadNoticeImg($_FILES, $this->request->post('id'));
        }

        $this->response->body(json_encode(['result' => 'success']));
    }

    public function action_add_notice()
    {
        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        $this->response->body(json_encode(['id' => $noticeModel->addNotice($_POST)]));
    }
}
