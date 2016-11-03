<!DOCTYPE html>
<html lang="ru" class="no-touch">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, user-scalable=no" name="viewport">
    <title>Аренда недвижимости без комиссии во Владивостоке</title>
    <meta name="description"
          content="Снять недвижимость в Москве без комиссии. Новые проверенные объявления каждый день. Сдавайте и снимайте жилье на самой большой доске объявлений от собственников.">
    <link href="/public/i/logo.png" rel="shortcut icon" type="image/x-icon">
    <link rel="stylesheet" media="screen" href="/public/css/bootstrap.css">
    <link rel="stylesheet" media="screen" href="/public/css/base.css">
    <style type="text/css">
        .fancybox-margin {
            margin-right: 17px;
        }
    </style>
    <link rel="stylesheet" media="screen" href="/public/css/style.css">
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
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="/public/js/bootstrap.js"></script>
</head>
<body>
<?= $content; ?>
</body>
<div class="modal fade" id="loginModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <form accept-charset="UTF-8" method="post" class="modal-form" novalidate="novalidate">
                <div class="modal-form-header">
                    <div class="modal-form-title">
                        Регистрация
                    </div>
                </div>
                <div class="modal-form-content">
                    <div class="modal-form-item">
                        <div class="input">
                            <input type="text" name="user[email]" placeholder="Электронная почта" required="" class="input-control" value="" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-form-item">
                        <div class="input">
                            <input type="password" name="user[password]" placeholder="Пароль" required="" class="input-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-form-item modal-form-item-actions">
                        <div class="modal-form-item-cell">
                            <button type="submit" class="button button-blue modal-form-submit">
                                Зарегистрироваться
                            </button>
                        </div>
                        <div class="modal-form-item-cell">
                            <div class="modal-form-text modal-form-text-terms">
                                <span>
                                    <span>Регистрируясь, вы принимаете условия</span>
                                    <span> </span>
                                </span>
                                <a href="/pages/agreement" class="link" title="пользовательского соглашения">
                                    <b>пользовательского соглашения</b>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</html>