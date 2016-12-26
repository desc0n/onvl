<?php
/** @var $noticeModel Model_Notice */
$noticeModel = Model::factory('Notice');

/** @var $contentModel Model_Content */
$contentModel = Model::factory('Content');
?>
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
                                                        "lat":"<?=$notice['latitude'];?>",
                                                        "lng":"<?=$notice['longitude'];?>"
                                                    }
                                                ];

                                                var myMap = new ymaps.Map('map', {
                                                        center: [<?=$notice['latitude'];?>, <?=$notice['longitude'];?>],
                                                        zoom: 15,
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
                            <h2 class="main-card-address"><?=Arr::get($notice, 'address');?></h2>
                            <div class="main-card-desc">
                                <p><?=Arr::get($notice, 'description');?></p>
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
            <div class="container-fluid">
                <h2 class="section-title">Другие квартиры этого типа</h2>
                <div class="cards-container">
                    <section class="cards">
                        <div class="cards-list">
                            <?foreach ($noticeModel->findLastAddedByType((int)$notice['type'], (int)$notice['id']) as $lastAddedNotice) {?>
                            <div class="card">
                                <div class="card-inner">
                                    <a class="card-link" href="/notice/<?=$lastAddedNotice['id'];?>" target="_blank">
                                        <div class="card-content">
                                            <figure class="card-pic">
                                                <img class="card-pic-img" src="<?=$noticeModel->getNoticeMainThumbImg($lastAddedNotice['id']);?>" alt="<?=$lastAddedNotice['name'];?>">
                                                <div class="card-pic-bg" style="background-image:url(<?=$noticeModel->getNoticeMainThumbImg($lastAddedNotice['id']);?>);"></div>
                                                <div class="card-pic-overlay"></div>
                                            </figure>
                                            <div class="card-desc">
                                                <div class="card-options">
                                                    <div class="card-options-item">
                                                        <div class="card-options-item-label">Комнат</div>
                                                        <div class="card-options-item-value"><?=$lastAddedNotice['room_count'];?></div>
                                                    </div>
                                                    <div class="card-options-item">
                                                        <div class="card-options-item-label">
                                                            <span>Площадь</span>
                                                            <span>, </span>
                                                            <span>м</span>
                                                            <sup>2</sup>
                                                        </div>
                                                        <div class="card-options-item-value"><?=$lastAddedNotice['area'];?></div>
                                                    </div>
                                                    <div class="card-options-item">
                                                        <div class="card-options-item-label">
                                                            <span>руб</span>
                                                            <span>. / </span>
                                                            <span>месяц</span>
                                                        </div>
                                                        <div class="card-options-item-value"><?=number_format($lastAddedNotice['price'], 0, '.', ' ');?></div>
                                                    </div>
                                                </div>
                                                <div class="card-info">
                                                    <div class="card-info-item card-info-item-price">
                                                        <span class="card-price">
                                                            <span><?=number_format($lastAddedNotice['price'], 0, '.', ' ');?></span>
                                                            <span> руб</span>
                                                            <span>.</span>
                                                        </span>
                                                    </div>
                                                    <div class="card-info-item card-info-item-space">
                                                        <span class="card-space">
                                                            <span><?=$lastAddedNotice['type_name'];?></span>
                                                            <span>, </span>
                                                            <span><?=$lastAddedNotice['area'];?> </span>
                                                            <span>м</span>
                                                            <sup>2</sup>
                                                        </span>
                                                    </div>
                                                </div>
                                                <h4 class="card-title"><?=$lastAddedNotice['description'];?></h4>
                                                <div class="card-metro">
                                                    <span><?=$lastAddedNotice['address'];?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?}?>
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </div>
    <?=View::factory('service_list');?>
    <?= View::factory('footer'); ?>
</div>

