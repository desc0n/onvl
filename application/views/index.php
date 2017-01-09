<?php
/** @var $noticeModel Model_Notice */
$noticeModel = Model::factory('Notice');

/** @var $contentModel Model_Content */
$contentModel = Model::factory('Content');
?>
<div class="layout">
    <?=View::factory('header');?>
    <div class="header-hero">
        <div class="header-cover"></div>
        <div class="header-main">
            <div class="header-main-cell">
                <div class="container-fluid">
                    <h1 class="header-main-title">Аренда без посредников</h1>
                    <div class="header-main-search-form">
                        <form action="/search">
                            <div class="search-form">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-12 col-xs-12 col-md-5">
                                        <div class="col-lg-6 col-sm-12  col-xs-12 col-md-6 search-form-title">
                                            Количество комнат
                                        </div>
                                        <div class="col-lg-6 col-sm-12  col-xs-12 col-md-6 search-form-checkbox-btn-group text-center">
                                            <span class="btn-group">
                                                <?foreach ($noticeModel->findAllTypes(true) as $type){?>
                                                <label class="btn btn-default">
                                                    <input class="search-form-checkbox-control" type="checkbox" name="type[]" value="<?=$type['id'];?>">
                                                    <span class="search-form-checkbox-content"><?=$type['search_title'];?></span>
                                                </label>
                                                <?}?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-sm-12 col-xs-12 col-md-5">
                                        <div class="col-lg-3 col-sm-12  col-xs-12 col-md-3 search-form-title">
                                            Цена от
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4">
                                            <input type="text" class="form-control" placeholder="0" name="price_from">
                                        </div>
                                        <div class="col-lg-1 col-sm-12 col-xs-12 col-md-1 search-form-title">
                                            до
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4">
                                            <input type="text" class="form-control" placeholder="0" name="price_to">
                                        </div>
                                    </div>
                                    <p class="hidden-lg hidden-md">&nbsp;</p>
                                    <div class="col-lg-2 col-sm-12 col-xs-12 col-md-2 search-form-btn-block">
                                        <button class="btn button-blue search-form-btn col-lg-12 col-sm-12 col-xs-12 col-md-12">Найти</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?=View::factory('service_list');?>
    <div class="body">
        <section class="offers padding-top-no">
            <div class="container-fluid">
                <h2 class="section-title">Популярные предложения</h2>
                <div class="cards-container">
                    <div class="cards">
                        <div class="cards-list row">
                            <?foreach ($popularNotices as $notice) {?>
                            <div class="card col-sm-12 col-lg-3 col-md-3 col-xs-12">
                                <div class="card-inner">
                                    <a class="card-link" href="/notice/<?=$notice['id'];?>" target="_blank">
                                        <div class="card-content">
                                            <figure class="card-pic">
                                                <img class="card-pic-img" src="<?=$noticeModel->getNoticeMainThumbImg($notice['id']);?>" alt="<?=$notice['name'];?>">
                                                <div class="card-pic-bg" style="background-image:url(<?=$noticeModel->getNoticeMainThumbImg($notice['id']);?>);"></div>
                                                <div class="card-pic-overlay"></div>
                                                <span></span>
                                            </figure>
                                            <div class="card-desc">
                                                <div class="card-options">
                                                    <div class="card-options-item">
                                                        <div class="card-options-item-label">Комнат</div>
                                                        <div class="card-options-item-value"><?=$notice['room_count'];?></div>
                                                    </div>
                                                    <div class="card-options-item">
                                                        <div class="card-options-item-label">
                                                            <span>Площадь, м</span>
                                                            <sup>2</sup>
                                                        </div>
                                                        <div class="card-options-item-value"><?=$notice['area'];?></div>
                                                    </div>
                                                    <div class="card-options-item">
                                                        <div class="card-options-item-label">
                                                            <span>руб</span>
                                                            <span>. / месяц</span>
                                                        </div>
                                                        <div class="card-options-item-value"><?=number_format($notice['price'], 0, '.', ' ');?></div>
                                                    </div>
                                                </div>
                                                <div class="card-info">
                                                    <div class="card-info-item card-info-item-price">
                                                        <span class="card-price">
                                                            <span><?=number_format($notice['price'], 0, '.', ' ');?></span>
                                                            <span> </span>
                                                            <span>руб</span>
                                                            <span>.</span>
                                                        </span>
                                                    </div>
                                                    <div class="card-info-item card-info-item-space">
                                                        <span class="card-space">
                                                            <span><?=$notice['type_name'];?></span>
                                                            <span>, </span>
                                                            <span><?=$notice['area'];?></span>
                                                            <span>&nbsp;м</span>
                                                            <sup>2</sup></span>
                                                    </div>
                                                </div>
                                                <h4 class="card-title"><?=$notice['description'];?></h4>
                                                <div class="card-metro">
                                                    <span><?=$notice['address'];?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?}?>
                        </div>
                    </div>
                </div>
                <a class="btn button-blue btn-lg" href="/search">Посмотреть все</a></div>
        </section>
        <section class="features">
            <div class="container">
                <h2 class="section-title">Наши преимущества</h2>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-4 col-xs-12 feature">
                        <div class="feature-icon-wrapper">
                            <div class="grid-table grid-table-h grid-table-v">
                                <div class="grid-table-cell grid-table-cell-middle">
                                    <i
                                        class="feature-icon feature-icon-checking-classified">

                                    </i>
                                </div>
                            </div>
                        </div>
                        <h4>Без комиссии</h4>
                        <p>Мы&nbsp;проверяем каждое объявление и&nbsp;гарантируем, что у&nbsp;нас нет комиссии!</p>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-xs-12 feature">
                        <div class="feature-icon-wrapper">
                            <div class="grid-table grid-table-h grid-table-v">
                                <div class="grid-table-cell grid-table-cell-middle">
                                    <i
                                        class="feature-icon feature-icon-classifieds">

                                    </i>
                                </div>
                            </div>
                        </div>
                        <h4>Большая база</h4>
                        <p>До&nbsp;100&nbsp;новых объявлений ежедневно!</p>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-4 col-xs-12 feature">
                        <div class="feature-icon-wrapper">
                            <div class="grid-table grid-table-h grid-table-v">
                                <div class="grid-table-cell grid-table-cell-middle">
                                    <i
                                        class="feature-icon feature-icon-newsletter">

                                    </i>
                                </div>
                            </div>
                        </div>
                        <h4>Удобная рассылка</h4>
                        <p>Ловите свежие объявления в&nbsp;своем почтовом ящике!</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="reviews reviews-bubbly bg-gray">
            <div class="container"><h2 class="section-title">Отзывы</h2>
                <div class="reviews-list">
                    <div class="reviews-item">
                        <blockquote class="reviews-item-quote">23.03.2015 разместил объявление на сайте, прошёл проверку
                            администратора и буквально на следующий день 4 просмотра. В итоге за неделю спокойно сдал
                            квартиру. Честно говоря был удивлён, учитывая, что от известного агенства, где было
                            размещено объявление, был всего один звонок за неделю и тот неудачный.
                            Спасибо!
                        </blockquote>
                        <div class="reviews-item-author reviews-item-author-no-ava text-muted"><span
                                class="grid-table grid-table-h"><span class="grid-table-cell grid-table-cell-middle">Станислав арендодатель из Москвы</span></span>
                        </div>
                    </div>
                    <div class="reviews-item">
                        <blockquote class="reviews-item-quote">Дорогие onvl!
                            Отличный и удобный сервис, спасибо Вам большое! Сдали квартиру быстро и без лишних хлопот.
                            Будем советовать Вас друзьям и знакомым!
                            Спасибо!
                        </blockquote>
                        <div class="reviews-item-author reviews-item-author-no-ava text-muted"><span
                                class="grid-table grid-table-h"><span class="grid-table-cell grid-table-cell-middle">Анна </span></span>
                        </div>
                    </div>
                    <div class="reviews-item">
                        <blockquote class="reviews-item-quote">Лучший сервис по поиску недвижимости на настоящий момент.
                            Спасибо!
                        </blockquote>
                        <div class="reviews-item-author reviews-item-author-no-ava text-muted"><span
                                class="grid-table grid-table-h"><span class="grid-table-cell grid-table-cell-middle">Антон 35 лет</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="features">
            <div class="section-overlay" style="background-image: url('/public/i/background-apartment.jpg');"></div>
            <div class="container"><h2 class="section-title">Сдать квартиру?</h2>
                <div class="row">
                    <div class="col-xs-12 col-sm-3 col-md-3 col-xs-12 feature">
                        <div class="feature-icon-wrapper">
                            <div class="grid-table grid-table-h grid-table-v">
                                <div class="grid-table-cell grid-table-cell-middle"><i
                                        class="feature-icon feature-icon-quick"></i></div>
                            </div>
                        </div>
                        <h4>Сдать быстро и просто</h4>
                        <p>80% квартир на&nbsp;Onvl сдаются в&nbsp;первую неделю. Разумеется, при том условии, что вы&nbsp;выставили
                            адекватную цену. Кому нужна «двушка» за&nbsp;85&nbsp;тысяч рублей в&nbsp;месяц? Никому.</p>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-xs-12 feature">
                        <div class="feature-icon-wrapper">
                            <div class="grid-table grid-table-h grid-table-v">
                                <div class="grid-table-cell grid-table-cell-middle"><i
                                        class="feature-icon feature-icon-agreement"></i></div>
                            </div>
                        </div>
                        <h4><a target="_blank" style="color: #FFF;" href="#">Типовой договор</a></h4>
                        <p>Мы&nbsp;составили для вас типовой договор аренды,&nbsp;— можете скачивать его и&nbsp;подписывать
                            с&nbsp;арендатором.</p>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-xs-12 feature">
                        <div class="feature-icon-wrapper">
                            <div class="grid-table grid-table-h grid-table-v">
                                <div class="grid-table-cell grid-table-cell-middle"><i
                                        class="feature-icon feature-icon-public"></i></div>
                            </div>
                        </div>
                        <h4>Проверенная публика</h4>
                        <p>Onvl&nbsp;— это не&nbsp;глобальная доска объявлений, на&nbsp;которой собираются всякие
                            подозрительные личности. У&nbsp;нас сайт «для своих» и&nbsp;публика&nbsp;— соответствующая,
                            приличная.</p>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-md-3 col-xs-12 feature">
                        <div class="feature-icon-wrapper">
                            <div class="grid-table grid-table-h grid-table-v">
                                <div class="grid-table-cell grid-table-cell-middle">
                                    <i class="feature-icon feature-icon-no-agency"></i>
                                </div>
                            </div>
                        </div>
                        <h4>Без назойливых агентств</h4>
                        <p>Onvl&nbsp;— это отсутствие каких либо посредников.</p>
                    </div>

                </div>
                <?if(!Auth::instance()->logged_in()) {?>
                    <a class="btn button-blue btn-lg" data-toggle="modal" href="#loginModal">Сдать квартиру бесплатно</a>
                <?} else {?>
                    <a class="btn button-blue btn-lg" href="/notice/new">Сдать квартиру бесплатно</a>
                <?}?>
            </div>
        </section>
    </div>
    <?=View::factory('footer');?>
</div>