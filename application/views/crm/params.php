<?php
/** @var $noticeModel Model_Notice */
$noticeModel = Model::factory('Notice');
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Дополнительные параметры объявлений</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <table class="table table-bordered table-hover notices-table">
            <thead>
            <tr>
                <th>Тип</th>
                <th>Название</th>
                <th class="text-center">Действия</th>
            </tr>
            </thead>
            <tbody>
            <?foreach ($params as $param) {?>
                <tr id="paramRow<?=$param['id'];?>">
                    <td><?=$param['type_name'];?></td>
                    <td><?=$param['name'];?></td>
                    <td class="text-center">
                        <button title="Удалить параметр" class="btn btn-sm btn-danger" onclick="removeParam(<?=$param['id'];?>);"><i class="fa fa-remove fa-fw"></i></button>
                    </td>
                </tr>
            <?}?>
            </tbody>
        </table>
        <form method="post">
            <h3>Добавить параметр</h3>
            <div class="input-group">
                <div class="col-lg-12">
                    <input type="radio" name="type" required value="<?=$noticeModel::NOTICE_PARAM_FACILITIES;?>"> <?=$noticeModel->noticeParams[$noticeModel::NOTICE_PARAM_FACILITIES];?>
                </div>
                <div class="col-lg-12">
                    <input type="radio" name="type" required value="<?=$noticeModel::NOTICE_PARAM_SPECIFICS;?>"> <?=$noticeModel->noticeParams[$noticeModel::NOTICE_PARAM_SPECIFICS];?>
                </div>
            </div>
            <div class="input-group">
                <input type="text" class="form-control" name="name" placeholder="Название параметра" required>
                <span class="input-group-btn">
                    <button class="btn btn-default" name="addParam">
                        <span class="fa fa-check-circle fa-fw"></span> Сохранить
                    </button>
                </span>
            </div>
        </form>
    </div>
</div>