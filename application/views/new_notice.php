<?php
/** @var $noticeModel Model_Notice */
$noticeModel = Model::factory('Notice');

$userNotices = $noticeModel->findUserNotices();

if (count($userNotices) >= $noticeModel::NOTICES_USER_LIMIT) {
    echo '
    <div class="layout">
        <header class="header">
            <div class="header-navbar">
                <div class="container">
                    <div class="header-navbar-logo">
                        <a class="logo" href="/">
                            <img src="/public/i/logo.png">
                        </a>
                    </div>
                    <h1 class="header-navbar-lead">Добавить объявление</h1>
                </div>
            </div>
        </header>
        <div class="content">
            <div class="container">
                <h2 class="text-center limit-notices">Превышен лимит объявлений</h2>
            </div>
        </div>
    </div>
    ';

    return;
}
?>
<div class="layout">
    <header class="header">
        <div class="header-navbar">
            <div class="container">
                <div class="header-navbar-logo">
                    <a class="logo" href="/">
                        <img src="/public/i/logo.png">
                    </a>
                </div>
                <h1 class="header-navbar-lead">Добавить объявление</h1>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="container">
            <div class="form form-offer">
                <div class="form-step">
                    <div class="form-row">
                        <div class="form-row-label address-label">
                            Введите адрес
                            <div class="validate-form">
                                <i class="glyphicon glyphicon-remove"></i>
                            </div>
                        </div>
                        <div class="form-row-content">
                            <div class="form-group input input-group">
                                <input placeholder="Например, Светланская, 10" id="address" class="form-control">
                                <input type="hidden" id="latitude">
                                <input type="hidden" id="longitude">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="findCoordBtn">
                                        <i class="glyphicon glyphicon-search" title="Найти координаты"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="address-error">
                            </div>
                            <div class="notice-map" id="noticeMap">
                                <script type="text/javascript">
                                    ymaps.ready(function () {

                                        myMap = new ymaps.Map('noticeMap', {
                                            center: ['43.115141', '131.885341'],
                                            zoom: 12,
                                            type: "yandex#map"
                                        }, {
                                        }),
                                            BalloonContentLayout = ymaps.templateLayoutFactory.createClass(
                                                '<div id="listing-map">' +
                                                '</div>' );
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-step">
                    <div class="form-row">
                        <div class="form-row-label name-label">
                            Заголовок
                            <div class="validate-form">
                                <i class="glyphicon glyphicon-remove"></i>
                            </div>
                        </div>
                        <div class="form-row-content">
                            <div class="input">
                                <input class="form-control" placeholder="Например: «Трёшка на Русской»." type="text" id="name">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-label description-label">
                            Описание
                            <div class="validate-form">
                                <i class="glyphicon glyphicon-remove"></i>
                            </div>
                        </div>
                        <div class="form-row-content">
                            <div class="textarea">
                                <textarea class="form-control" id="description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-label">Фотографии</div>
                        <div class="form-row-content">
                            <div class="uploadzone dropzone-previews">
                                <div class="uploadzone-content">
                                    <input type="file" id="uploadImages" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-step">
                    <div class="form-row" data-switch-block="apartment">
                        <div class="form-row-label type-label">
                            Тип квартиры
                            <div class="validate-form">
                                <i class="glyphicon glyphicon-remove"></i>
                            </div>
                        </div>
                        <div class="form-row-content">
                            <?=Form::select('type', ([null=> 'не выбрано'] + $types), null, ['class' => 'form-control', 'id' => 'type']);?>
                        </div>
                    </div>
                    <div class="form-row form-row-options">
                        <div class="form-row-label">Параметры</div>
                        <div class="form-row-content">
                            <div class="grid">
                                <div class="grid-item grid-item-option grid-item-option-area">
                                    <label class="control-label">Площадь квартиры</label>
                                    <div class="input input-option input-inline">
                                        <input class="form-control" type="text" id="area" value="0">
                                    </div>
                                    <span class="form-text">м<sup>2</sup>
                                    </span>
                                </div>
                                <div class="grid-item grid-item-option grid-item-option-floor">
                                    <label class="control-label">Этаж</label>
                                    <div class="input input-option input-inline">
                                        <input class="form-control" type="text" id="floor" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-label">Цена в месяц</div>
                        <div class="form-row-content">
                            <div class="input input-inline input-price">
                                <input class="form-control" placeholder="0" type="text" id="price">
                            </div>
                            <span class="form-text">руб</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-label phone-label">
                            Телефон
                            <div class="validate-form">
                                <i class="glyphicon glyphicon-remove"></i>
                            </div>
                        </div>
                        <div class="form-row-content">
                            <div>
                                <div class="input">
                                    <input class="form-control" placeholder="+71234567890" type="text" id="phone">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-label">
                            Дополнительно
                        </div>
                        <div class="form-row-content">
                            <div class="param-list">
                                <div class="input">
                                    <div class="col-md-6">
                                        <h4 class="text-muted"><?=$noticeModel->noticeParams[$noticeModel::NOTICE_PARAM_FACILITIES];?></h4>
                                        <?foreach ($params as $param) {?>
                                            <?if ($param['type'] !== $noticeModel::NOTICE_PARAM_FACILITIES) {continue;}?>
                                            <div class="col-md-12">
                                                <input type="checkbox" name="param[]" value="<?=$param['id'];?>">
                                                <span class="text-muted"><?=$param['name'];?></span>
                                            </div>
                                        <?}?>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-muted"><?=$noticeModel->noticeParams[$noticeModel::NOTICE_PARAM_SPECIFICS];?></h4>
                                        <?foreach ($params as $param) {?>
                                            <?if ($param['type'] !== $noticeModel::NOTICE_PARAM_SPECIFICS) {continue;}?>
                                            <div class="col-md-12">
                                                <input type="checkbox" name="param[]" value="<?=$param['id'];?>">
                                                <span class="text-muted"><?=$param['name'];?></span>
                                            </div>
                                        <?}?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-content">
                            <button name="button" id="newNoticeBtn" class="button button-blue button-xl">Отправить на модерацию
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?=View::factory('footer');?>
</div>