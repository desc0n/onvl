<?php
/** @var $noticeModel Model_Notice */
$noticeModel = Model::factory('Notice');

$noticeParams = $noticeModel->getNoticeParams(Arr::get($notice, 'id'));
?>
<div class="layout">
    <header class="header">
        <div class="header-navbar">
            <div class="container">
                <div class="header-navbar-logo">
                    <a class="logo" href="/">
                    </a>
                </div>
                <h1 class="header-navbar-lead">Редактировать объявление</h1>
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
                                <i class="glyphicon glyphicon-ok"></i>
                            </div>
                        </div>
                        <div class="form-row-content">
                            <div class="input input-group">
                                <input placeholder="Например, Светланская, 10" id="address" class="form-control" value="<?=Arr::get($notice, 'address');?>">
                                <input type="hidden" id="latitude" value="<?=Arr::get($notice, 'latitude');?>">
                                <input type="hidden" id="longitude" value="<?=Arr::get($notice, 'longitude');?>">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="findCoordBtn">
                                        <i class="glyphicon glyphicon-search" title="Найти координаты"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-step">
                    <div class="form-row">
                        <div class="form-row-label name-label">
                            Заголовок
                            <div class="validate-form">
                                <i class="glyphicon glyphicon-ok"></i>
                            </div>
                        </div>
                        <div class="form-row-content">
                            <div class="input">
                                <input class="form-control" placeholder="Например: «Трёшка на Русской»." type="text" id="name" value="<?=Arr::get($notice, 'name');?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-label description-label">
                            Описание
                            <div class="validate-form">
                                <i class="glyphicon glyphicon-ok"></i>
                            </div>
                        </div>
                        <div class="form-row-content">
                            <div class="textarea">
                                <textarea class="form-control" id="description"><?=Arr::get($notice, 'description');?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-label">Фотографии</div>
                        <div class="form-row-content">
                            <div class="row">
                                <?foreach($noticeModel->getNoticeImg(Arr::get($notice,'id')) as $img){?>
                                    <div class="col-lg-3" id="noticeImg<?=$img['id'];?>">
                                        <a href="#" class="thumbnail" onclick="redactNoticeImg(<?=$img['id'];?>, '<?=$img['src'];?>');">
                                            <img src="/public/img/thumb/<?=$img['src'];?>">
                                        </a>
                                    </div>
                                <?}?>
                            </div>
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
                                <i class="glyphicon glyphicon-ok"></i>
                            </div>
                        </div>
                        <div class="form-row-content">
                            <?=Form::select('type', ([null=> 'не выбрано'] + $types), Arr::get($notice, 'type'), ['class' => 'form-control', 'id' => 'type']);?>
                        </div>
                    </div>
                    <div class="form-row form-row-options">
                        <div class="form-row-label">Параметры</div>
                        <div class="form-row-content">
                            <div class="grid">
                                <div class="grid-item grid-item-option grid-item-option-area">
                                    <label class="control-label">Площадь квартиры</label>
                                    <div class="input input-option input-inline">
                                        <input class="form-control" type="text" id="area" value="<?=Arr::get($notice, 'area');?>">
                                    </div>
                                    <span class="form-text">м<sup>2</sup>
                                    </span>
                                </div>
                                <div class="grid-item grid-item-option grid-item-option-floor">
                                    <label class="control-label">Этаж</label>
                                    <div class="input input-option input-inline">
                                        <input class="form-control" type="text" id="floor" value="<?=Arr::get($notice, 'floor');?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-label">Цена в месяц</div>
                        <div class="form-row-content">
                            <div class="input input-inline input-price">
                                <input class="form-control" placeholder="0" type="text" id="price" value="<?=Arr::get($notice, 'price');?>">
                            </div>
                            <span class="form-text">руб</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-label phone-label">
                            Телефон
                            <div class="validate-form">
                                <i class="glyphicon glyphicon-ok"></i>
                            </div>
                        </div>
                        <div class="form-row-content">
                            <div>
                                <div class="input">
                                    <input class="form-control" placeholder="+71234567890" type="text" id="phone" value="<?=Arr::get($notice, 'phone');?>">
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
                                                <input type="checkbox" name="param[]" <?=(in_array($param['id'], $noticeParams) ? 'checked' : null);?> value="<?=$param['id'];?>">
                                                <span class="text-muted"><?=$param['name'];?></span>
                                            </div>
                                        <?}?>
                                    </div>
                                    <div class="col-md-6">
                                        <h4 class="text-muted"><?=$noticeModel->noticeParams[$noticeModel::NOTICE_PARAM_SPECIFICS];?></h4>
                                        <?foreach ($params as $param) {?>
                                            <?if ($param['type'] !== $noticeModel::NOTICE_PARAM_SPECIFICS) {continue;}?>
                                            <div class="col-md-12">
                                                <input type="checkbox" name="param[]" <?=(in_array($param['id'], $noticeParams) ? 'checked' : null);?> value="<?=$param['id'];?>">
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
                            <input type="hidden" id="itemId" value="<?=Arr::get($notice, 'id');?>">
                            <button name="button" id="redactNoticeBtn" class="button button-blue button-xl">Сохранить
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?=View::factory('footer');?>
</div>
<div class="modal fade" id="redactImgModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Просмотр изображения</h4>
            </div>
            <div class="modal-body text-center">

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" onclick="removeNoticeImg();">Удалить изображение</button>
            </div>
        </div>
    </div>
</div>