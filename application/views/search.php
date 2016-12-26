<div class="layout">
    <?= View::factory('header'); ?>
    <div class="body search-body">
        <div class="catalog-container">
            <div class="catalog">
                <div id="map">
                    <script type="text/javascript">
                        ymaps.ready(function () {
                            var properties = [
                                {
                                    "lat":"43.143568",
                                    "lng":"131.907499",
                                },
                                {
                                    "lat":"43.15019",
                                    "lng":"131.906254",
                                }
                            ];

                            var myMap = new ymaps.Map('map', {
                                    center: [43.114894, 131.90443],
                                    zoom: 12,
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
                <div class="catalog-content">
                    <div class="container-fluid search-container">
                        <div class="catalog-grid">
                            <div class="catalog-grid-col catalog-grid-col-aside">
                                <div id="filter_sticky" class="filter">
                                    <form id="filter-form">
                                        <div class="filter-main">
                                            <div class="filter-body">
                                                <div class="filter-row">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                                            <span>Цена от</span>
                                                            <input class="form-control" type="text" id="price_from" name="price_from" value="<?=Arr::get($get, 'price_from', 0);?>">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                                            <span>до</span>
                                                            <input class="form-control" type="text" id="price_to" name="price_to" value="<?=Arr::get($get, 'price_to', 30000);?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-row">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                                            <span>Площадь от</span>
                                                            <input class="form-control" type="text" id="area_from" name="area_from" value="<?=Arr::get($get, 'area_from', 0);?>">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                                            <span>до</span>
                                                            <input class="form-control" type="text" id="area_to" name="area_to" value="<?=Arr::get($get, 'area_to', 0);?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-row">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <span>Этаж</span>
                                                            <input class="form-control" type="text" id="floor" name="floor" value="<?=Arr::get($get, 'floor', 0);?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-row">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <button class="btn btn-primary col-xs-12 col-sm-12 col-md-12 col-lg-12">Найти</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="filter-row">
                                                    <div class="filter-extra">
                                                        <div class="filter-extra-trigger">
                                                            Дополнительно
                                                        </div>
                                                        <div class="filter-extra-body">
                                                            <div class="filter-row">
                                                                <div class="filter-label">
                                                                    Удобства
                                                                </div>
                                                                <ul class="filter-list">
                                                                    <li class="filter-list-item">
                                                                        <label class="filter-checkbox filter-checkbox-normal">
                                                                            <input class="filter-checkbox-control" type="checkbox">
                                                                            <span class="filter-checkbox-fake"></span>
                                                                            <span class="filter-checkbox-text">Балкон</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label class="filter-checkbox filter-checkbox-normal">
                                                                            <input class="filter-checkbox-control" type="checkbox">
                                                                            <span class="filter-checkbox-fake"></span>
                                                                            <span class="filter-checkbox-text">Посудомоечная машина</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label class="filter-checkbox filter-checkbox-normal">
                                                                            <input class="filter-checkbox-control" type="checkbox">
                                                                            <span class="filter-checkbox-fake"></span>
                                                                            <span class="filter-checkbox-text">Холодильник</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label class="filter-checkbox filter-checkbox-normal">
                                                                            <input class="filter-checkbox-control" type="checkbox">
                                                                            <span class="filter-checkbox-fake"></span>
                                                                            <span class="filter-checkbox-text">Стиральная машина</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label class="filter-checkbox filter-checkbox-normal">
                                                                            <input class="filter-checkbox-control" type="checkbox">
                                                                            <span class="filter-checkbox-fake"></span>
                                                                            <span class="filter-checkbox-text">Телевизор</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label class="filter-checkbox filter-checkbox-normal">
                                                                            <input class="filter-checkbox-control" type="checkbox">
                                                                            <span class="filter-checkbox-fake"></span>
                                                                            <span class="filter-checkbox-text">Нагреватель воды</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label class="filter-checkbox filter-checkbox-normal">
                                                                            <input class="filter-checkbox-control" type="checkbox">
                                                                            <span class="filter-checkbox-fake"></span>
                                                                            <span class="filter-checkbox-text">Кондиционер</span>
                                                                        </label>
                                                                    </li>
                                                                </ul>
                                                                <div class="filter-label">
                                                                    Особенности
                                                                </div>
                                                                <ul class="filter-list">
                                                                    <li class="filter-list-item">
                                                                        <label class="filter-checkbox filter-checkbox-normal">
                                                                            <input class="filter-checkbox-control" type="checkbox">
                                                                            <span class="filter-checkbox-fake"></span>
                                                                            <span class="filter-checkbox-text">Можно курить</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label class="filter-checkbox filter-checkbox-normal">
                                                                            <input class="filter-checkbox-control" type="checkbox">
                                                                            <span class="filter-checkbox-fake"></span>
                                                                            <span class="filter-checkbox-text">Подходит для мероприятий</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label class="filter-checkbox filter-checkbox-normal">
                                                                            <input class="filter-checkbox-control" type="checkbox">
                                                                            <span class="filter-checkbox-fake"></span>
                                                                            <span class="filter-checkbox-text">Можно с животными</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label class="filter-checkbox filter-checkbox-normal">
                                                                            <input class="filter-checkbox-control" type="checkbox">
                                                                            <span class="filter-checkbox-fake"></span>
                                                                            <span class="filter-checkbox-text">Подходит для семьи с детьми</span>
                                                                        </label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="catalog-grid-col catalog-grid-col-main">
                                <div class="catalog-list">
                                    <div id="cards" class="cards">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= View::factory('footer'); ?>
</div>