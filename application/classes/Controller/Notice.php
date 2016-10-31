<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Notice extends Controller_Base
{
	public function action_index()
	{
		/** @var $contentModel Model_Content */
		$contentModel = Model::factory('Content');

        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

		$id = $this->request->param('id');

		$params = $this->request->query();
		$params['id'] = $id;


		$notice = $noticeModel->getNotice($params);
		$noticeModel->setNoticeView($id);

		$itemData = (!empty($notice) ? $notice[0] : []);

		View::set_global('title', Arr::get($itemData, 'name'));
		View::set_global('rootPage', 'main');

		$template = $contentModel->getBaseTemplate();

		$template->content=View::factory('notice')
			->set('itemData', $itemData)
			->set('id', $id)
		;

		$this->response->body($template);
	}

	public function action_new()
    {
        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');

        View::set_global('title', 'Разместить объявление о сдаче квартиры');
        View::set_global('rootPage', 'new_notice');

        $template = $contentModel->getBaseTemplate();

        $template->content=View::factory('new_notice')
        ;

        $this->response->body($template);
    }
}