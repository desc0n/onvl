<?php
/** @var $noticeModel Model_Notice */
$noticeModel = Model::factory('Notice');
?>
<div class="col-sm-12">
    <h3>Добавление объявления</h3>
    <div class="row">
        <div class="col-md-12">
            <h3>Изображение</h3>
            <?foreach($noticeModel->getNoticeImg(Arr::get($noticeData,'id')) as $img){?>
                <div class="col-lg-3" id="noticeImg<?=$img['id'];?>">
                    <a href="#" class="thumbnail" onclick="redactNoticeImg(<?=$img['id'];?>, '<?=$img['src'];?>');">
                        <img src="/public/img/thumb/<?=$img['src'];?>">
                    </a>
                </div>
            <?}?>
            <div class="col-lg-3">
                <a  data-toggle="modal" href="#loadImgModal" class="thumbnail">
                    <img data-src="holder.js/100%x190" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Описание</h3>
            <form method="post">
                <div class="row form-group">
                    <div class="col-md-4">
                        <div class="text-muted col-md-12">Тип:</div>
                        <div class="col-md-12">
                            <?=Form::select('type', $types, Arr::get($noticeData, 'type'), ['class' => 'form-control']);?>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="text-muted col-md-12">Этаж:</div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  name="floor" value="<?=Arr::get($noticeData, 'floor');?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="text-muted col-md-12">Площадь:</div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  name="area" value="<?=Arr::get($noticeData, 'area');?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-muted col-md-12">Цена:</div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  name="price" placeholder="Стоимость" value="<?=Arr::get($noticeData, 'price');?>">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <div class="text-muted col-md-12">Адрес:</div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  name="address" value="<?=Arr::get($noticeData, 'address');?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-muted col-md-12">Широта:</div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  name="latitude" value="<?=Arr::get($noticeData, 'latitude');?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="text-muted col-md-12">Долгота:</div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  name="longitude" value="<?=Arr::get($noticeData, 'longitude');?>">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="text-muted col-md-12">Название:</div>
                        <div class="col-md-12">
                            <input type="text" class="form-control"  name="name" placeholder="Название" value="<?=Arr::get($noticeData, 'name');?>">
                        </div>
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <div class="text-muted col-sm-12">Описание:</div>
                        <div class="col-sm-12">
                            <textarea class="form-control"  name="description" placeholder="Описание" rows="10"><?=Arr::get($noticeData, 'description');?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12">
                        <h3>Дополнительные параметры</h3>
                        <div class="col-md-6">
                            <h4 class="text-muted"><?=$noticeModel->noticeParams[$noticeModel::NOTICE_PARAM_FACILITIES];?></h4>
                            <?foreach ($params as $param) {?>
                                <?if ($param['type'] !== $noticeModel::NOTICE_PARAM_FACILITIES) {continue;}?>
                                <div class="col-md-12">
                                    <input type="checkbox" <?=(in_array($param['id'], $noticeParams) ? 'checked' : null);?> name="param[]" value="<?=$param['id'];?>">
                                    <span class="text-muted"><?=$param['name'];?></span>
                                </div>
                            <?}?>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-muted"><?=$noticeModel->noticeParams[$noticeModel::NOTICE_PARAM_SPECIFICS];?></h4>
                            <?foreach ($params as $param) {?>
                                <?if ($param['type'] !== $noticeModel::NOTICE_PARAM_SPECIFICS) {continue;}?>
                                <div class="col-md-12">
                                    <input type="checkbox" <?=(in_array($param['id'], $noticeParams) ? 'checked' : null);?> name="param[]" value="<?=$param['id'];?>">
                                    <span class="text-muted"><?=$param['name'];?></span>
                                </div>
                            <?}?>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-block btn-success" name="redact_notice" value="<?=Arr::get($noticeData, 'id');?>">Сохранить</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="loadImgModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Загрузка изображения</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" enctype='multipart/form-data'>
                    <div class="form-group">
                        <label for="exampleInputFile">Выбор файла</label>
                        <input type="file" name="imgname[]" id="exampleInputFile" multiple>
                    </div>
                    <button type="submit" class="btn btn-default">Загрузить</button>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="redactImgModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Просмотр изображения</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" onclick="removeNoticeImg();">Удалить изображение</button>
            </div>
        </div>
    </div>
</div>