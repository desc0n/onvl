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
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="/notice/new">Добавить объявление</a>
                                    </li>
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