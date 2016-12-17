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

        $notice = $noticeModel->findById($id);
        $noticeModel->setNoticeView($id);

        View::set_global('title', Arr::get($notice, 'name'));
        View::set_global('rootPage', 'notice');

        $template = $contentModel->getBaseTemplate();

        $template->content=View::factory('notice')
            ->set('notice', $notice)
            ->set('popularNotices', $noticeModel->findPopular())
            ->set('id', $id)
        ;

        $this->response->body($template);
    }

    public function action_new()
    {
        if(!Auth::instance()->logged_in()) {
            HTTP::redirect('/');
        }

        /** @var $contentModel Model_Content */
        $contentModel = Model::factory('Content');

        /** @var $noticeModel Model_Notice */
        $noticeModel = Model::factory('Notice');


        View::set_global('title', 'Добавить объявление');
        View::set_global('rootPage', 'newNotice');

        $template = $contentModel->getBaseTemplate();

        $template->content=View::factory('new_notice')
            ->set('popularNotices', $noticeModel->findPopular())
            ->set('types', $noticeModel->findAllTypes())
        ;

        $this->response->body($template);
    }
}