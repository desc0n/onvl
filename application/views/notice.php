<?php
/** @var $noticeModel Model_Notice */
$noticeModel = Model::factory('Notice');

/** @var $contentModel Model_Content */
$contentModel = Model::factory('Content');
?>
<?= View::factory('navigation'); ?>
<div class="layout">
    <?= View::factory('header'); ?>
    <div class="content">
        <div class="main-card">
            <div class="main-card-carousel">
                <!-- Slider Starts -->
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators hidden-xs">
                        <?
                        $indicatorActive = null;

                        foreach($noticeModel->getNoticeImg($notice['id']) as $i => $img){
                            $indicatorActive = $indicatorActive === null ? 'active' : '';?>
                            <li data-target="#carousel" data-slide-to="<?=$i;?>" class="<?=$indicatorActive;?>"></li>
                        <?}?>
                    </ol>
                    <div class="carousel-inner">
                        <?
                        $itemActive = null;

                        foreach($noticeModel->getNoticeImg($notice['id']) as $i => $img){
                            $itemActive = $itemActive === null ? 'active' : '';?>
                            <div class="item <?=$itemActive;?>">
                                <img src="/public/img/original/<?=$img['src'];?>" class="properties" alt="properties" />
                            </div>
                        <?}?>
                    </div>
                    <a class="left carousel-control" href="#carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <a class="right carousel-control" href="#carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
                <!-- #Slider Ends -->
            </div>
            <div class="main-card-content" data-js="sticky-parent">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <div>
                                <div class="main-card-options-bar">
                                    <div class="main-card-options-bar-item">
                                        <div class="main-card-options-bar-value"><?=Arr::get($notice, 'floor');?></div>
                                        <div class="main-card-options-bar-label">Этаж</div>
                                    </div>
                                    <div class="main-card-options-bar-item">
                                        <div class="main-card-options-bar-value"><?=Arr::get($notice, 'room_count');?></div>
                                        <div class="main-card-options-bar-label">Комнат</div>
                                    </div>
                                    <div class="main-card-options-bar-item">
                                        <div class="main-card-options-bar-value"><?=Arr::get($notice, 'area');?></div>
                                        <div class="main-card-options-bar-label">Площадь, м<sup>2</sup></div>
                                    </div>
                                    <div class="main-card-options-bar-item">
                                        <div class="main-card-options-bar-value"><?=Arr::get($notice, 'price');?></div>
                                        <div class="main-card-options-bar-label">руб</div>
                                    </div>
                                </div>
                                <div class="main-card-contacts">
                                    <div class="main-card-contacts-line main-card-contacts-line-fixed">
                                        <div>
                                            <?if(!Auth::instance()->logged_in()) {?>
                                                <a class="btn button-blue" data-toggle="modal" href="#loginModal">Телефон собственника</a>
                                            <?} else {?>
                                                <a class="btn button-blue">Телефон собственника</a>
                                            <?}?>
                                        </div>
                                        <div>
                                            <?if(!Auth::instance()->logged_in()) {?>
                                                <button class="btn btn-danger" data-toggle="modal" href="#loginModal"><span class="glyphicon glyphicon-heart"></span> В избранное</button>
                                            <?} else {?>
                                                <button class="btn btn-danger"><span class="glyphicon glyphicon-heart"></span> В избранное</button>
                                            <?}?>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-card-contacts row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="map">
                                        <script type="text/javascript">
                                            ymaps.ready(function () {
                                                var properties = [
                                                    {
                                                        "lat":"43.143568",
                                                        "lng":"131.907499"
                                                    }
                                                ];

                                                var myMap = new ymaps.Map('map', {
                                                        center: [43.143568, 131.907499],
                                                        zoom: 13,
                                                        type: "yandex#map"
                                                    }, {
                                                    }),
                                                    BalloonContentLayout = ymaps.templateLayoutFactory.createClass(
                                                        '<div id="listing-map">' +
                                                        '</div>' );

                                                jQuery.each(properties,function(e, f){
                                                    var placemark = new ymaps.Placemark([f.lat, f.lng], {
                                                    }, {
                                                        balloonContentLayout: BalloonContentLayout,
                                                        balloonPanelMaxMapArea: 0
                                                    });

                                                    myMap.geoObjects.add(placemark);
                                                });
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <h1 class="main-card-title"><?=Arr::get($notice, 'name');?></h1>
                            <div class="main-card-desc"><p></p>
                                <p>
                                    <?=Arr::get($notice, 'description');?>
                                </p>
                            </div>
<!--                            <div class="main-card-features">-->
<!--                                <h5 class="main-card-features-title">Дополнительные характеристики</h5>-->
<!--                                <ul class="main-card-features-list">-->
<!--                                    <li class="main-card-features-item">-->
<!--                                        <span class="glyphicon glyphicon-ok-circle"></span>-->
<!--                                        Балкон-->
<!--                                    </li>-->
<!--                                    <li class="main-card-features-item">-->
<!--                                        <span class="glyphicon glyphicon-ok-circle"></span>-->
<!--                                        Посудомоечная машина-->
<!--                                    </li>-->
<!--                                    <li class="main-card-features-item">-->
<!--                                        <span class="glyphicon glyphicon-ok-circle"></span>-->
<!--                                        Холодильник-->
<!--                                    </li>-->
<!--                                    <li class="main-card-features-item">-->
<!--                                        <span class="glyphicon glyphicon-ok-circle"></span>-->
<!--                                        Стиральная машина-->
<!--                                    </li>-->
<!--                                    <li class="main-card-features-item">-->
<!--                                        <span class="glyphicon glyphicon-ok-circle"></span>-->
<!--                                        Телевизор-->
<!--                                    </li>-->
<!--                                    <li class="main-card-features-item">-->
<!--                                        <span class="glyphicon glyphicon-ok-circle"></span>-->
<!--                                        Нагреватель воды-->
<!--                                    </li>-->
<!--                                    <li class="main-card-features-item">-->
<!--                                        <span class="glyphicon glyphicon-ok-circle"></span>-->
<!--                                        Кондиционер-->
<!--                                    </li>-->
<!--                                    <li class="main-card-features-item">-->
<!--                                        <span class="glyphicon glyphicon-ok-circle"></span>-->
<!--                                        Можно курить-->
<!--                                    </li>-->
<!--                                    <li class="main-card-features-item">-->
<!--                                        <span class="glyphicon glyphicon-ok-circle"></span>-->
<!--                                        Подходит для мероприятий-->
<!--                                    </li>-->
<!--                                    <li class="main-card-features-item __disabled">-->
<!--                                        <span class="glyphicon glyphicon-remove-circle"></span>-->
<!--                                        Можно с животными-->
<!--                                    </li>-->
<!--                                    <li class="main-card-features-item">-->
<!--                                        <span class="glyphicon glyphicon-ok-circle"></span>-->
<!--                                        Подходит для семьи с детьми-->
<!--                                    </li>-->
<!--                                </ul>-->
<!--                            </div>-->
                            <div class="main-card-interest">
                                <div class="main-card-interest-title">Понравилась квартира?</div>
                                <div>
                                    <?if(!Auth::instance()->logged_in()) {?>
                                    <a class="btn button-blue" data-toggle="modal" href="#loginModal">Телефон собственника</a>
                                    <?} else {?>
                                    <a class="btn button-blue">Телефон собственника</a>
                                    <?}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="offers offers-similar">
            <div class="container-fluid"><h2 class="section-title">Другие 1-х комнатные квартиры</h2>
                <div data-react-class="AdCards"
                     data-react-props="{&quot;ads&quot;:[{&quot;id&quot;:212157,&quot;title&quot;:&quot;Сдается трехкомнатная квартира в сталинском доме&quot;,&quot;path&quot;:&quot;/sdaetsya-trehkomnatnaya-kvartira-v-stalinskom-dome&quot;,&quot;space&quot;:&quot;85&quot;,&quot;price&quot;:&quot;70 000&quot;,&quot;price_currency&quot;:&quot;руб&quot;,&quot;image&quot;:&quot;https://assets.thelocals.ru/uploads/image/file/1625742/thumb_71cfada2.jpg&quot;,&quot;rooms&quot;:3,&quot;subways&quot;:&quot;Нагатинская, Тульская&quot;,&quot;date&quot;:&quot;6 дней назад&quot;,&quot;featured&quot;:false,&quot;premium&quot;:false,&quot;favorite&quot;:false,&quot;owned&quot;:false},{&quot;id&quot;:194082,&quot;title&quot;:&quot;Комфортабельная трешка&quot;,&quot;path&quot;:&quot;/komfortabelnaya-treshka&quot;,&quot;space&quot;:&quot;79&quot;,&quot;price&quot;:&quot;65 000&quot;,&quot;price_currency&quot;:&quot;руб&quot;,&quot;image&quot;:&quot;https://assets.thelocals.ru/uploads/image/file/1493363/thumb_2c92a069.jpg&quot;,&quot;rooms&quot;:3,&quot;subways&quot;:&quot;Семёновская&quot;,&quot;date&quot;:&quot;7 дней назад&quot;,&quot;featured&quot;:false,&quot;premium&quot;:false,&quot;favorite&quot;:false,&quot;owned&quot;:false},{&quot;id&quot;:214309,&quot;title&quot;:&quot;Трешка на Академической&quot;,&quot;path&quot;:&quot;/treshka-na-akademicheskoy-e4614b20-8be9-4f59-be8c-8f4c89a69aad&quot;,&quot;space&quot;:&quot;90&quot;,&quot;price&quot;:&quot;70 000&quot;,&quot;price_currency&quot;:&quot;руб&quot;,&quot;image&quot;:&quot;https://assets.thelocals.ru/uploads/image/file/1642028/thumb_d7b7070a.jpg&quot;,&quot;rooms&quot;:3,&quot;subways&quot;:&quot;Академическая, Профсоюзная&quot;,&quot;date&quot;:&quot;20 минут назад&quot;,&quot;featured&quot;:false,&quot;premium&quot;:false,&quot;favorite&quot;:false,&quot;owned&quot;:false},{&quot;id&quot;:183835,&quot;title&quot;:&quot;Трехкомнатная квартира после капитального ремонта м.Каховская &quot;,&quot;path&quot;:&quot;/trehkomnatnaya-kvartira-posle-kapitalnogo-remonta-m-kahovskaya&quot;,&quot;space&quot;:&quot;60&quot;,&quot;price&quot;:&quot;60 000&quot;,&quot;price_currency&quot;:&quot;руб&quot;,&quot;image&quot;:&quot;https://assets.thelocals.ru/uploads/image/file/1417437/thumb_68540194.jpg&quot;,&quot;rooms&quot;:3,&quot;subways&quot;:&quot;Каховская, Севастопольская&quot;,&quot;date&quot;:&quot;7 дней назад&quot;,&quot;featured&quot;:false,&quot;premium&quot;:false,&quot;favorite&quot;:false,&quot;owned&quot;:false}],&quot;signedIn&quot;:false,&quot;hasStatusViewed&quot;:false}"
                     class="cards-container">
                    <section class="cards" data-reactid=".1ln2bw9x81s">
                        <div class="cards-list" data-reactid=".1ln2bw9x81s.0">
                            <div class="card" data-reactid=".1ln2bw9x81s.0.$212157">
                                <div class="card-inner" data-reactid=".1ln2bw9x81s.0.$212157.0"><a class="card-link"
                                                                                                   href="/sdaetsya-trehkomnatnaya-kvartira-v-stalinskom-dome"
                                                                                                   target="_blank"
                                                                                                   data-reactid=".1ln2bw9x81s.0.$212157.0.0">
                                        <div class="card-content" data-reactid=".1ln2bw9x81s.0.$212157.0.0.0">
                                            <figure class="card-pic" data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.0"><img
                                                    class="card-pic-img"
                                                    src="https://assets.thelocals.ru/uploads/image/file/1625742/thumb_71cfada2.jpg"
                                                    alt="Сдается трехкомнатная квартира в сталинском доме"
                                                    data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.0.0">
                                                <div class="card-pic-bg"
                                                     style="background-image:url(https://assets.thelocals.ru/uploads/image/file/1625742/thumb_71cfada2.jpg);"
                                                     data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.0.1"></div>
                                                <div class="card-pic-overlay"
                                                     data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.0.2"></div>
                                                <div class="card-date" data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.0.3">6
                                                    дней назад
                                                </div>
                                                <span data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.0.4"></span></figure>
                                            <div class="card-desc" data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1">
                                                <div class="card-options"
                                                     data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0">
                                                    <div class="card-options-item"
                                                         data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0.0">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0.0.0">Комнат
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0.0.1">3
                                                        </div>
                                                    </div>
                                                    <div class="card-options-item"
                                                         data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0.1">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0.1.0"><span
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0.1.0.0">Площадь</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0.1.0.1">, </span><span
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0.1.0.2">м</span><sup
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0.1.0.3">2</sup>
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0.1.1">85
                                                        </div>
                                                    </div>
                                                    <div class="card-options-item"
                                                         data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0.2">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0.2.0"><span
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0.2.0.0">руб</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0.2.0.1">. / </span><span
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0.2.0.2">месяц</span>
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.0.2.1">70 000
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-info" data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.1">
                                                    <div class="card-info-item card-info-item-price"
                                                         data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.1.0"><span
                                                            class="card-price"
                                                            data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.1.0.0"><span
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.1.0.0.0">70 000</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.1.0.0.1"> </span><span
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.1.0.0.2">руб</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.1.0.0.3">.</span></span>
                                                    </div>
                                                    <div class="card-info-item card-info-item-space"
                                                         data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.1.1"><span
                                                            class="card-space"
                                                            data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.1.1.0"><span
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.1.1.0.0">3-комн.</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.1.1.0.1">, </span><span
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.1.1.0.2">85</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.1.1.0.3">&nbsp;</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.1.1.0.4">м</span><sup
                                                                data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.1.1.0.5">2</sup></span>
                                                    </div>
                                                </div>
                                                <h4 class="card-title" data-reactid=".1ln2bw9x81s.0.$212157.0.0.0.1.2">
                                                    Сдается трехкомнатная квартира в сталинском доме</h4>
                                                <div class="card-metro">
                                                    <span>Нагатинская, Тульская</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card" data-reactid=".1ln2bw9x81s.0.$194082">
                                <div class="card-inner" data-reactid=".1ln2bw9x81s.0.$194082.0"><a class="card-link"
                                                                                                   href="/komfortabelnaya-treshka"
                                                                                                   target="_blank"
                                                                                                   data-reactid=".1ln2bw9x81s.0.$194082.0.0">
                                        <div class="card-content" data-reactid=".1ln2bw9x81s.0.$194082.0.0.0">
                                            <figure class="card-pic" data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.0"><img
                                                    class="card-pic-img"
                                                    src="https://assets.thelocals.ru/uploads/image/file/1493363/thumb_2c92a069.jpg"
                                                    alt="Комфортабельная трешка"
                                                    data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.0.0">
                                                <div class="card-pic-bg"
                                                     style="background-image:url(https://assets.thelocals.ru/uploads/image/file/1493363/thumb_2c92a069.jpg);"
                                                     data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.0.1"></div>
                                                <div class="card-pic-overlay"
                                                     data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.0.2"></div>
                                                <div class="card-date" data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.0.3">7
                                                    дней назад
                                                </div>
                                                <span data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.0.4"></span></figure>
                                            <div class="card-desc" data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1">
                                                <div class="card-options"
                                                     data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0">
                                                    <div class="card-options-item"
                                                         data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0.0">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0.0.0">Комнат
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0.0.1">3
                                                        </div>
                                                    </div>
                                                    <div class="card-options-item"
                                                         data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0.1">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0.1.0"><span
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0.1.0.0">Площадь</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0.1.0.1">, </span><span
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0.1.0.2">м</span><sup
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0.1.0.3">2</sup>
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0.1.1">79
                                                        </div>
                                                    </div>
                                                    <div class="card-options-item"
                                                         data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0.2">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0.2.0"><span
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0.2.0.0">руб</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0.2.0.1">. / </span><span
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0.2.0.2">месяц</span>
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.0.2.1">65 000
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-info" data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.1">
                                                    <div class="card-info-item card-info-item-price"
                                                         data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.1.0"><span
                                                            class="card-price"
                                                            data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.1.0.0"><span
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.1.0.0.0">65 000</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.1.0.0.1"> </span><span
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.1.0.0.2">руб</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.1.0.0.3">.</span></span>
                                                    </div>
                                                    <div class="card-info-item card-info-item-space"
                                                         data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.1.1"><span
                                                            class="card-space"
                                                            data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.1.1.0"><span
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.1.1.0.0">3-комн.</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.1.1.0.1">, </span><span
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.1.1.0.2">79</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.1.1.0.3">&nbsp;</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.1.1.0.4">м</span><sup
                                                                data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.1.1.0.5">2</sup></span>
                                                    </div>
                                                </div>
                                                <h4 class="card-title" data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.2">
                                                    Комфортабельная трешка</h4>
                                                <div class="card-metro" data-reactid=".1ln2bw9x81s.0.$194082.0.0.0.1.3">
                                                    <span>Семёновская</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card" data-reactid=".1ln2bw9x81s.0.$214309">
                                <div class="card-inner" data-reactid=".1ln2bw9x81s.0.$214309.0"><a class="card-link"
                                                                                                   href="/treshka-na-akademicheskoy-e4614b20-8be9-4f59-be8c-8f4c89a69aad"
                                                                                                   target="_blank"
                                                                                                   data-reactid=".1ln2bw9x81s.0.$214309.0.0">
                                        <div class="card-content" data-reactid=".1ln2bw9x81s.0.$214309.0.0.0">
                                            <figure class="card-pic" data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.0"><img
                                                    class="card-pic-img"
                                                    src="https://assets.thelocals.ru/uploads/image/file/1642028/thumb_d7b7070a.jpg"
                                                    alt="Трешка на Академической"
                                                    data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.0.0">
                                                <div class="card-pic-bg"
                                                     style="background-image:url(https://assets.thelocals.ru/uploads/image/file/1642028/thumb_d7b7070a.jpg);"
                                                     data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.0.1"></div>
                                                <div class="card-pic-overlay"
                                                     data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.0.2"></div>
                                                <div class="card-date" data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.0.3">
                                                    20 минут назад
                                                </div>
                                                <span data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.0.4"></span></figure>
                                            <div class="card-desc" data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1">
                                                <div class="card-options"
                                                     data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0">
                                                    <div class="card-options-item"
                                                         data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0.0">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0.0.0">Комнат
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0.0.1">3
                                                        </div>
                                                    </div>
                                                    <div class="card-options-item"
                                                         data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0.1">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0.1.0"><span
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0.1.0.0">Площадь</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0.1.0.1">, </span><span
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0.1.0.2">м</span><sup
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0.1.0.3">2</sup>
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0.1.1">90
                                                        </div>
                                                    </div>
                                                    <div class="card-options-item"
                                                         data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0.2">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0.2.0"><span
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0.2.0.0">руб</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0.2.0.1">. / </span><span
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0.2.0.2">месяц</span>
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.0.2.1">70 000
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-info" data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.1">
                                                    <div class="card-info-item card-info-item-price"
                                                         data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.1.0"><span
                                                            class="card-price"
                                                            data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.1.0.0"><span
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.1.0.0.0">70 000</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.1.0.0.1"> </span><span
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.1.0.0.2">руб</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.1.0.0.3">.</span></span>
                                                    </div>
                                                    <div class="card-info-item card-info-item-space"
                                                         data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.1.1"><span
                                                            class="card-space"
                                                            data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.1.1.0"><span
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.1.1.0.0">3-комн.</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.1.1.0.1">, </span><span
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.1.1.0.2">90</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.1.1.0.3">&nbsp;</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.1.1.0.4">м</span><sup
                                                                data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.1.1.0.5">2</sup></span>
                                                    </div>
                                                </div>
                                                <h4 class="card-title" data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.2">
                                                    Трешка на Академической</h4>
                                                <div class="card-metro" data-reactid=".1ln2bw9x81s.0.$214309.0.0.0.1.3">
                                                    <span>Академическая, Профсоюзная</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card" data-reactid=".1ln2bw9x81s.0.$183835">
                                <div class="card-inner" data-reactid=".1ln2bw9x81s.0.$183835.0"><a class="card-link"
                                                                                                   href="/trehkomnatnaya-kvartira-posle-kapitalnogo-remonta-m-kahovskaya"
                                                                                                   target="_blank"
                                                                                                   data-reactid=".1ln2bw9x81s.0.$183835.0.0">
                                        <div class="card-content" data-reactid=".1ln2bw9x81s.0.$183835.0.0.0">
                                            <figure class="card-pic" data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.0"><img
                                                    class="card-pic-img"
                                                    src="https://assets.thelocals.ru/uploads/image/file/1417437/thumb_68540194.jpg"
                                                    alt="Трехкомнатная квартира после капитального ремонта м.Каховская "
                                                    data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.0.0">
                                                <div class="card-pic-bg"
                                                     style="background-image:url(https://assets.thelocals.ru/uploads/image/file/1417437/thumb_68540194.jpg);"
                                                     data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.0.1"></div>
                                                <div class="card-pic-overlay"
                                                     data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.0.2"></div>
                                                <div class="card-date" data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.0.3">7
                                                    дней назад
                                                </div>
                                                <span data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.0.4"></span></figure>
                                            <div class="card-desc" data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1">
                                                <div class="card-options"
                                                     data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0">
                                                    <div class="card-options-item"
                                                         data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0.0">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0.0.0">Комнат
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0.0.1">3
                                                        </div>
                                                    </div>
                                                    <div class="card-options-item"
                                                         data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0.1">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0.1.0"><span
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0.1.0.0">Площадь</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0.1.0.1">, </span><span
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0.1.0.2">м</span><sup
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0.1.0.3">2</sup>
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0.1.1">60
                                                        </div>
                                                    </div>
                                                    <div class="card-options-item"
                                                         data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0.2">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0.2.0"><span
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0.2.0.0">руб</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0.2.0.1">. / </span><span
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0.2.0.2">месяц</span>
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.0.2.1">60 000
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-info" data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.1">
                                                    <div class="card-info-item card-info-item-price"
                                                         data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.1.0"><span
                                                            class="card-price"
                                                            data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.1.0.0"><span
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.1.0.0.0">60 000</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.1.0.0.1"> </span><span
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.1.0.0.2">руб</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.1.0.0.3">.</span></span>
                                                    </div>
                                                    <div class="card-info-item card-info-item-space"
                                                         data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.1.1"><span
                                                            class="card-space"
                                                            data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.1.1.0"><span
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.1.1.0.0">3-комн.</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.1.1.0.1">, </span><span
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.1.1.0.2">60</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.1.1.0.3">&nbsp;</span><span
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.1.1.0.4">м</span><sup
                                                                data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.1.1.0.5">2</sup></span>
                                                    </div>
                                                </div>
                                                <h4 class="card-title" data-reactid=".1ln2bw9x81s.0.$183835.0.0.0.1.2">
                                                    Трехкомнатная квартира после капитального ремонта м.Каховская </h4>
                                                <div class="card-metro">
                                                    <span>Каховская, Севастопольская</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
    <?=View::factory('service_list');?>
    <?= View::factory('footer'); ?>
</div>

