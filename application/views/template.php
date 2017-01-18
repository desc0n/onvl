<!DOCTYPE html>
<html lang="ru" class="no-touch">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
    <title>Аренда недвижимости без комиссии во Владивостоке</title>
    <meta name="description" content="Снять недвижимость во Владивостоке без комиссии.">
    <link href="/public/i/logo.png" rel="shortcut icon" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,900,900i" rel="stylesheet">
    <link rel="stylesheet" media="screen" href="/public/css/bootstrap.css">
    <link rel="stylesheet" media="screen" href="/public/css/base.css?v=2">
    <style type="text/css">
        .fancybox-margin {
            margin-right: 17px;
        }
    </style>
    <link rel="stylesheet" media="screen" href="/public/css/style.css?v=2">
    <style type="text/css" media="screen">
        .uv-icon:hover {
            opacity: 1
        }
    </style>
    <style type="text/css" media="print">
        #uvTab, .uv-tray, .uv-icon, .uv-popover, .uv-bubble {
            display: none !important
        }
    </style>
    <script src="/public/js/jquery.min.js"></script>
    <script src="/public/js/bootstrap.js"></script>
    <script src="/public/js/bootstrap3-typeahead.js"></script>
    <script src="/public/js/scripts.js?v=5"></script>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
</head>
<body>
<?= $content; ?>
<script type="text/javascript" src="//cdn.callbackhunter.com/cbh.js?hunter_code=8df52181ef406ffdbd60aa74f2391c29" charset="UTF-8"></script>
</body>
<div class="modal fade" id="loginModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Войти</h4>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">Вход</a></li>
                    <li><a href="#tab2" data-toggle="tab">Регистрация</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <form class="form" method="post" action="/">
                                    <div style="margin-bottom: 25px" class="form-group">
                                        <input name="username" class="form-control" placeholder="Ваш логин" required="">
                                    </div>
                                    <div style="margin-bottom: 25px" class="form-group">
                                        <input name="password" type="password" class="form-control" placeholder="Ваш пароль" required="">
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block filled-button" type="submit" name="login">Вход</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <div class="row">
                            <div class="col-md-12 col-sm-12" id="regForm">
                                <div style="margin-bottom: 25px" class="form-group">
                                    <input id="username" class="form-control" placeholder="Логин" required="">
                                </div>
                                <div style="margin-bottom: 25px" class="form-group">
                                    <input id="email" class="form-control" placeholder="E-mail" required="">
                                </div>
                                <div style="margin-bottom: 25px" class="form-group">
                                    <input id="password" type="password" class="form-control" placeholder="Пароль" required="">
                                </div>
                                <div style="margin-bottom: 25px" class="form-group">
                                    <input id="rePassword" type="password" class="form-control" placeholder="Подтвердить пароль" required="">
                                </div>
                                <button class="btn btn-lg btn-primary btn-block filled-button" id="regBtn">Зарегистрироваться</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="errorModalLabel">Ошибка</h4>
            </div>
            <div class="modal-body" id="errorModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ownerPhoneModal" tabindex="-1" role="dialog" aria-labelledby="ownerPhoneModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center" id="ownerPhoneModalBody"></div>
        </div>
    </div>
</div>
</html>