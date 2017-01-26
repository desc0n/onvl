<?php
/** @var $noticeModel Model_Notice */
$noticeModel = Model::factory('Notice');

$userNotices = Auth::instance()->logged_in() ? $noticeModel->findUserNotices() : [];
$userLikedNotices = Auth::instance()->logged_in() ? $noticeModel->findUserLikedNotices() : [];
?>
<header class="header">
    <div class="header-topline">
        <div class="container-fluid">
            <div class="header-topline-main">
                <div class="header-topline-item col-xs-12 col-sm-4">
                    <div class="header-navbar-logo">
                        <a class="logo" href="/">
                            <img src="/public/i/logo.png">
                        </a>
                    </div>
                </div>
                <div class="header-topline-item col-xs-12 col-sm-4">

                </div>
                <div class="header-topline-item col-xs-12 col-sm-4">
                    <?if(!Auth::instance()->logged_in()) {?>
                    <i class="glyphicon glyphicon-user"></i>
                    <a class="header-topline-link header-topline-link-block pull-right" data-toggle="modal" href="#loginModal">
                         Войти в кабинет
                    </a>
                    <?} else {?>
                        <span class="header-topline-link header-topline-link-block">
                            <i class="glyphicon glyphicon-user"></i>
                            <div class="dropdown">
                                <a class="toggle-link" data-toggle="dropdown" href="#"><?=Auth::instance()->get_user()->username;?></a>
                                <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dLabel">
                                    <?if(count($userNotices)){?>
                                    <li role="presentation" class="dropdown-header text-center text-muted">Редактировать объявления</li>
                                    <li role="presentation" class="divider"></li>
                                    <?}?>
                                    <?foreach ($userNotices as $userNotice) {?>
                                    <li role="presentation">
                                        <a class="text-left" role="menuitem" tabindex="-1" href="/notice/redact/<?=$userNotice['id'];?>"><?=$userNotice['name'];?></a>
                                    </li>
                                    <?}?>
                                    <?if(count($userLikedNotices)){?>
                                    <li role="presentation" class="divider"></li>
                                    <li role="presentation" class="dropdown-liked text-center text-muted">Избранное</li>
                                    <li role="presentation" class="divider"></li>
                                    <?}?>
                                    <?foreach ($userLikedNotices as $likedNotice) {?>
                                    <li role="presentation" class="liked-header-link" id="liked<?=$likedNotice['notice_id'];?>">
                                        <a class="text-left" role="menuitem" tabindex="-1" href="/notice/<?=$likedNotice['notice_id'];?>"><?=$likedNotice['name'];?></a>
                                        <span class="glyphicon glyphicon-remove pull-right" onclick="removeFromLiked(<?=$likedNotice['notice_id'];?>);"></span>
                                    </li>
                                    <?}?>
                                    <?if(count($userNotices) < $noticeModel::NOTICES_USER_LIMIT) {?>
                                    <li role="presentation" class="text-center">
                                        <a class="btn button-blue text-center add-notice-btn" role="menuitem" tabindex="-1" href="/notice/new">Добавить объявление</a>
                                    </li>
                                    <?}?>
                                </ul>
                            </div>
                        </span>
                        <form class="pull-right logout-form" method="post" action="/">
                            <input type="hidden" name="logout">
                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-log-out"></i></button>
                        </form>
                    <?}?>
                </div>
            </div>
        </div>
    </div>
</header>