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
                <tr id="noticeRow<?=$param['id'];?>">
                    <td><?=$param['type_name'];?></td>
                    <td><?=$param['name'];?></td>
                    <td class="text-center">
                        <button title="Удалить параметр" class="btn btn-sm btn-danger" onclick="removeParam(<?=$param['id'];?>);"><i class="fa fa-remove fa-fw"></i></button>
                    </td>
                </tr>
            <?}?>
            </tbody>
        </table>
    </div>
</div>