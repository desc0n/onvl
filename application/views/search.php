<?= View::factory('navigation'); ?>
<div class="layout">
    <?= View::factory('header'); ?>
    <div class="body">
        <div class="catalog-container">
            <div class="catalog __list" data-reactid=".1vz5g377mdc">
                <a class="filter-trigger-button" data-reactid=".1vz5g377mdc.0">
                    Показать фильтр
                </a>
                <div class="catalog-header" data-reactid=".1vz5g377mdc.1">
                    <div class="container-fluid" data-reactid=".1vz5g377mdc.1.0">
                        <div class="button-group button-group-view" data-reactid=".1vz5g377mdc.1.0.0">
                            <button class="button button-view-list __active" data-reactid=".1vz5g377mdc.1.0.0.0">
                                Списком
                            </button>
                            <button class="button button-view-map" data-reactid=".1vz5g377mdc.1.0.0.1">
                                На карте
                            </button>
                        </div>
                        <div class="breadcrumbs" data-reactid=".1vz5g377mdc.1.0.1">
                            <ul class="breadcrumbs-list" data-reactid=".1vz5g377mdc.1.0.1.0">
                                <li class="breadcrumbs-item" data-reactid=".1vz5g377mdc.1.0.1.0.0">
                                    <a class="breadcrumbs-link" href="/" title="Главная"
                                       data-reactid=".1vz5g377mdc.1.0.1.0.0.0">
                                        Главная
                                    </a>
                                </li>
                                <li class="breadcrumbs-item" data-reactid=".1vz5g377mdc.1.0.1.0.1">
                                    <a class="breadcrumbs-link" title="Поиск" data-reactid=".1vz5g377mdc.1.0.1.0.1.0">
                                        Поиск
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="sorting" data-reactid=".1vz5g377mdc.1.0.2">
                            <div class="sorting-title" data-reactid=".1vz5g377mdc.1.0.2.0">
                                <span data-reactid=".1vz5g377mdc.1.0.2.0.0">663</span>
                                <span data-reactid=".1vz5g377mdc.1.0.2.0.1"> </span>
                                <span data-reactid=".1vz5g377mdc.1.0.2.0.2">квартиры отсортированы</span>
                            </div>
                            <div class="sorting-item __active" data-reactid=".1vz5g377mdc.1.0.2.1">по дате добавления
                            </div>
                            <div class="sorting-item" data-reactid=".1vz5g377mdc.1.0.2.2">по цене</div>
                            <div class="sorting-item" data-reactid=".1vz5g377mdc.1.0.2.3">по площади</div>
                        </div>
                        <h1 class="catalog-title" data-reactid=".1vz5g377mdc.1.0.3">Аренда квартир без посредников</h1>
                    </div>
                </div>
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
                <div class="catalog-content" data-reactid=".1vz5g377mdc.2">
                    <div class="catalog-results-count" data-reactid=".1vz5g377mdc.2.0">
                        <span data-reactid=".1vz5g377mdc.2.0.0">663</span>
                        <span data-reactid=".1vz5g377mdc.2.0.1"> </span>
                        <span data-reactid=".1vz5g377mdc.2.0.2">квартир</span>
                    </div>
                    <div class="container-fluid" data-reactid=".1vz5g377mdc.2.1">
                        <div class="catalog-grid" id="filter_sticky_parent" data-reactid=".1vz5g377mdc.2.1.0">
                            <div class="catalog-grid-col catalog-grid-col-aside" data-reactid=".1vz5g377mdc.2.1.0.0">
                                <div id="filter_sticky" class="filter __hide" data-reactid=".1vz5g377mdc.2.1.0.0.0">
                                    <form id="filter-form" data-reactid=".1vz5g377mdc.2.1.0.0.0.0">
                                        <div class="filter-main" data-reactid=".1vz5g377mdc.2.1.0.0.0.0.0">
                                            <div class="filter-header" data-reactid=".1vz5g377mdc.2.1.0.0.0.0.0.0">
                                                <a class="filter-action-button filter-reset-button"
                                                   data-reactid=".1vz5g377mdc.2.1.0.0.0.0.0.0.0">
                                                    <span
                                                        data-reactid=".1vz5g377mdc.2.1.0.0.0.0.0.0.0.0">Сбросить</span>
                                                </a>
                                                <div class="filter-close" data-reactid=".1vz5g377mdc.2.1.0.0.0.0.0.0.1">
                                                    <i class="filter-close-icon"
                                                       data-reactid=".1vz5g377mdc.2.1.0.0.0.0.0.0.1.0">

                                                    </i>
                                                </div>
                                                <div class="filter-title" data-reactid=".1vz5g377mdc.2.1.0.0.0.0.0.0.2">
                                                    Фильтр
                                                </div>
                                            </div>
                                            <div class="filter-body">
                                                <div class="filter-row">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                                            <span>Цена от</span>
                                                            <input class="form-control" type="text" value="0">
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
                                                            <span>до</span>
                                                            <input class="form-control" type="text" value="30000">
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
                                                                <div class="filter-grid">
                                                                    <div class="filter-grid-cell filter-grid-cell-50p">
                                                                        <div class="filter-label">
                                                                            Площадь в м<sup>2</sup>
                                                                        </div>
                                                                        <div class="filter-grid">
                                                                            <div class="filter-grid-cell filter-grid-cell-50p">
                                                                                <input class="filter-input filter-input-sm text-center" type="text">
                                                                            </div>
                                                                            <div class="filter-grid-cell filter-grid-cell-gap filter-grid-cell-gap-dash">
                                                                                -
                                                                            </div>
                                                                            <div
                                                                                class="filter-grid-cell filter-grid-cell-50p">
                                                                                <input
                                                                                    class="filter-input filter-input-sm text-center"
                                                                                    type="text">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="filter-grid-cell filter-grid-cell-gap filter-grid-cell-gap-34">
                                                                        &nbsp;</div>
                                                                    <div class="filter-grid-cell filter-grid-cell-50p">
                                                                        <div class="filter-label">
                                                                            Этаж
                                                                        </div>
                                                                        <div class="filter-grid">
                                                                            <div
                                                                                class="filter-grid-cell filter-grid-cell-50p">
                                                                                <input
                                                                                    class="filter-input filter-input-sm text-center"
                                                                                    type="text">
                                                                            </div>
                                                                            <div
                                                                                class="filter-grid-cell filter-grid-cell-gap filter-grid-cell-gap-dash">
                                                                                -
                                                                            </div>
                                                                            <div
                                                                                class="filter-grid-cell filter-grid-cell-50p">
                                                                                <input
                                                                                    class="filter-input filter-input-sm text-center"
                                                                                    type="text">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="filter-row">
                                                                <div class="filter-label">
                                                                    Удобства
                                                                </div>
                                                                <ul class="filter-list">
                                                                    <li class="filter-list-item">
                                                                        <label
                                                                            class="filter-checkbox filter-checkbox-normal">
                                                                            <input
                                                                                class="filter-checkbox-control"
                                                                                type="checkbox">
                                                                            <span
                                                                                class="filter-checkbox-fake">

                                                                            </span>
                                                                            <span
                                                                                class="filter-checkbox-text">Балкон</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label
                                                                            class="filter-checkbox filter-checkbox-normal">
                                                                            <input
                                                                                class="filter-checkbox-control"
                                                                                type="checkbox">
                                                                            <span
                                                                                class="filter-checkbox-fake">

                                                                            </span>
                                                                            <span
                                                                                class="filter-checkbox-text">Посудомоечная машина</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label
                                                                            class="filter-checkbox filter-checkbox-normal">
                                                                            <input
                                                                                class="filter-checkbox-control"
                                                                                type="checkbox">
                                                                            <span
                                                                                class="filter-checkbox-fake">

                                                                            </span>
                                                                            <span
                                                                                class="filter-checkbox-text">Холодильник</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label
                                                                            class="filter-checkbox filter-checkbox-normal">
                                                                            <input
                                                                                class="filter-checkbox-control"
                                                                                type="checkbox">
                                                                            <span
                                                                                class="filter-checkbox-fake">

                                                                            </span>
                                                                            <span
                                                                                class="filter-checkbox-text">Стиральная машина</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label
                                                                            class="filter-checkbox filter-checkbox-normal">
                                                                            <input
                                                                                class="filter-checkbox-control"
                                                                                type="checkbox">
                                                                            <span
                                                                                class="filter-checkbox-fake">

                                                                            </span>
                                                                            <span
                                                                                class="filter-checkbox-text">Телевизор</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label
                                                                            class="filter-checkbox filter-checkbox-normal">
                                                                            <input
                                                                                class="filter-checkbox-control"
                                                                                type="checkbox">
                                                                            <span
                                                                                class="filter-checkbox-fake">

                                                                            </span>
                                                                            <span
                                                                                class="filter-checkbox-text">Нагреватель воды</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label
                                                                            class="filter-checkbox filter-checkbox-normal">
                                                                            <input
                                                                                class="filter-checkbox-control"
                                                                                type="checkbox">
                                                                            <span
                                                                                class="filter-checkbox-fake">

                                                                            </span>
                                                                            <span
                                                                                class="filter-checkbox-text">Кондиционер</span>
                                                                        </label>
                                                                    </li>
                                                                </ul>
                                                                <div class="filter-label">
                                                                    Особенности
                                                                </div>
                                                                <ul class="filter-list">
                                                                    <li class="filter-list-item">
                                                                        <label
                                                                            class="filter-checkbox filter-checkbox-normal">
                                                                            <input
                                                                                class="filter-checkbox-control"
                                                                                type="checkbox">
                                                                            <span
                                                                                class="filter-checkbox-fake">

                                                                            </span>
                                                                            <span
                                                                                class="filter-checkbox-text">Можно курить</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label
                                                                            class="filter-checkbox filter-checkbox-normal">
                                                                            <input
                                                                                class="filter-checkbox-control"
                                                                                type="checkbox">
                                                                            <span
                                                                                class="filter-checkbox-fake">

                                                                            </span>
                                                                            <span
                                                                                class="filter-checkbox-text">Подходит для мероприятий</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label
                                                                            class="filter-checkbox filter-checkbox-normal">
                                                                            <input
                                                                                class="filter-checkbox-control"
                                                                                type="checkbox">
                                                                            <span
                                                                                class="filter-checkbox-fake">

                                                                            </span>
                                                                            <span
                                                                                class="filter-checkbox-text">Можно с животными</span>
                                                                        </label>
                                                                    </li>
                                                                    <li class="filter-list-item">
                                                                        <label
                                                                            class="filter-checkbox filter-checkbox-normal">
                                                                            <input
                                                                                class="filter-checkbox-control"
                                                                                type="checkbox">
                                                                            <span
                                                                                class="filter-checkbox-fake">

                                                                            </span>
                                                                            <span
                                                                                class="filter-checkbox-text">Подходит для семьи с детьми</span>
                                                                        </label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="filter-footer" class="filter-apply-button">Применить</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="catalog-grid-col catalog-grid-col-main" data-reactid=".1vz5g377mdc.2.1.0.1">
                                <div class="catalog-list" data-reactid=".1vz5g377mdc.2.1.0.1.0">
                                    <div class="cards" data-reactid=".1vz5g377mdc.2.1.0.1.0.0">
                                        <div class="cards-list row">
                                            <div class="card col-sm-12 col-lg-4" data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659">
                                                <div class="card-inner"
                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0">
                                                    <a
                                                        class="card-link"
                                                        href="/notice/2"
                                                        target="_blank"
                                                        data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0">
                                                        <div class="card-content"
                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0">
                                                            <figure class="card-pic"
                                                                    data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.0">
                                                                <img class="card-pic-img"
                                                                     src="https://assets.thelocals.ru/uploads/image/file/172557/thumb____________.jpg"
                                                                     alt="Двушка в новом жк бизнес-класса «Да Винчи»"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.0.0">
                                                                <div class="card-pic-bg"
                                                                     style="background-image:url(https://assets.thelocals.ru/uploads/image/file/172557/thumb____________.jpg);"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.0.1">

                                                                </div>
                                                                <div class="card-pic-overlay"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.0.2">

                                                                </div>
                                                                <div class="card-date"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.0.3">
                                                                    2 дня назад
                                                                </div>
                                                                <span
                                                                    data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.0.4">

                                                                </span>
                                                            </figure>
                                                            <div class="card-desc"
                                                                 data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1">
                                                                <div class="card-options"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0">
                                                                    <div class="card-options-item"
                                                                         data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0.0">
                                                                        <div class="card-options-item-label"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0.0.0">
                                                                            Комнат
                                                                        </div>
                                                                        <div class="card-options-item-value"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0.0.1">
                                                                            2
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-options-item"
                                                                         data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0.1">
                                                                        <div class="card-options-item-label"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0.1.0">
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0.1.0.0">Площадь</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0.1.0.1">, </span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0.1.0.2">м</span>
                                                                            <sup
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0.1.0.3">2</sup>
                                                                        </div>
                                                                        <div class="card-options-item-value"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0.1.1">
                                                                            68
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-options-item"
                                                                         data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0.2">
                                                                        <div class="card-options-item-label"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0.2.0">
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0.2.0.0">руб</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0.2.0.1">. / </span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0.2.0.2">месяц</span>
                                                                        </div>
                                                                        <div class="card-options-item-value"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.0.2.1">
                                                                            55 000
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-info"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.1">
                                                                    <div class="card-info-item card-info-item-price"
                                                                         data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.1.0">
                                                                        <span class="card-price"
                                                                              data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.1.0.0">
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.1.0.0.0">55 000</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.1.0.0.1"> </span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.1.0.0.2">руб</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.1.0.0.3">.</span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="card-info-item card-info-item-space"
                                                                         data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.1.1">
                                                                        <span class="card-space"
                                                                              data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.1.1.0">
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.1.1.0.0">2-комн.</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.1.1.0.1">, </span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.1.1.0.2">68</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.1.1.0.3">&nbsp;</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.1.1.0.4">м</span>
                                                                            <sup
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.1.1.0.5">2</sup>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <h4 class="card-title"
                                                                    data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:$19659.0.0.0.1.2">
                                                                    Двушка в новом жк бизнес-класса «Да Винчи»</h4>
                                                                <div class="card-metro">
                                                                    <span>Кунцевская, Молодёжная</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card col-sm-12 col-lg-4" data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169">
                                                <div class="card-inner"
                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0">
                                                    <a
                                                        class="card-link"
                                                        href="/notice/2"
                                                        target="_blank"
                                                        data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0">
                                                        <div class="card-content"
                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0">
                                                            <figure class="card-pic"
                                                                    data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.0">
                                                                <img class="card-pic-img"
                                                                     src="https://assets.thelocals.ru/uploads/image/file/1620199/thumb_d1bd366c.jpg"
                                                                     alt="Большая трешка с отличным свежим ремонтом"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.0.0">
                                                                <div class="card-pic-bg"
                                                                     style="background-image:url(https://assets.thelocals.ru/uploads/image/file/1620199/thumb_d1bd366c.jpg);"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.0.1">

                                                                </div>
                                                                <div class="card-pic-overlay"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.0.2">

                                                                </div>
                                                                <div class="card-date"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.0.3">
                                                                    2 дня назад
                                                                </div>
                                                                <span
                                                                    data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.0.4">

                                                                </span>
                                                            </figure>
                                                            <div class="card-desc"
                                                                 data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1">
                                                                <div class="card-options"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0">
                                                                    <div class="card-options-item"
                                                                         data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.0">
                                                                        <div class="card-options-item-label"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.0.0">
                                                                            Комнат
                                                                        </div>
                                                                        <div class="card-options-item-value"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.0.1">
                                                                            3
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-options-item"
                                                                         data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.1">
                                                                        <div class="card-options-item-label"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.1.0">
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.1.0.0">Площадь</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.1.0.1">, </span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.1.0.2">м</span>
                                                                            <sup
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.1.0.3">2</sup>
                                                                        </div>
                                                                        <div class="card-options-item-value"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.1.1">
                                                                            74
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-options-item"
                                                                         data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.2">
                                                                        <div class="card-options-item-label"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.2.0">
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.2.0.0">руб</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.2.0.1">. / </span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.2.0.2">месяц</span>
                                                                        </div>
                                                                        <div class="card-options-item-value"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.2.1">
                                                                            65 000
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-info"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1">
                                                                    <div class="card-info-item card-info-item-price"
                                                                         data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.0">
                                                                        <span class="card-price"
                                                                              data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.0.0">
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.0.0.0">65 000</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.0.0.1"> </span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.0.0.2">руб</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.0.0.3">.</span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="card-info-item card-info-item-space"
                                                                         data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.1">
                                                                        <span class="card-space"
                                                                              data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.1.0">
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.1.0.0">3-комн.</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.1.0.1">, </span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.1.0.2">74</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.1.0.3">&nbsp;</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.1.0.4">м</span>
                                                                            <sup
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.1.0.5">2</sup>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <h4 class="card-title"
                                                                    data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.2">
                                                                    Большая трешка с отличным свежим ремонтом</h4>
                                                                <div class="card-metro">
                                                                    <span>Волжская, Кузьминки</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="card col-sm-12 col-lg-4" data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169">
                                                <div class="card-inner"
                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0">
                                                    <a
                                                        class="card-link"
                                                        href="/notice/2"
                                                        target="_blank"
                                                        data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0">
                                                        <div class="card-content"
                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0">
                                                            <figure class="card-pic"
                                                                    data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.0">
                                                                <img class="card-pic-img"
                                                                     src="https://assets.thelocals.ru/uploads/image/file/1620199/thumb_d1bd366c.jpg"
                                                                     alt="Большая трешка с отличным свежим ремонтом"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.0.0">
                                                                <div class="card-pic-bg"
                                                                     style="background-image:url(https://assets.thelocals.ru/uploads/image/file/1620199/thumb_d1bd366c.jpg);"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.0.1">

                                                                </div>
                                                                <div class="card-pic-overlay"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.0.2">

                                                                </div>
                                                                <div class="card-date"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.0.3">
                                                                    2 дня назад
                                                                </div>
                                                                <span
                                                                    data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.0.4">

                                                                </span>
                                                            </figure>
                                                            <div class="card-desc"
                                                                 data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1">
                                                                <div class="card-options"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0">
                                                                    <div class="card-options-item"
                                                                         data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.0">
                                                                        <div class="card-options-item-label"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.0.0">
                                                                            Комнат
                                                                        </div>
                                                                        <div class="card-options-item-value"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.0.1">
                                                                            3
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-options-item"
                                                                         data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.1">
                                                                        <div class="card-options-item-label"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.1.0">
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.1.0.0">Площадь</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.1.0.1">, </span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.1.0.2">м</span>
                                                                            <sup
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.1.0.3">2</sup>
                                                                        </div>
                                                                        <div class="card-options-item-value"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.1.1">
                                                                            74
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-options-item"
                                                                         data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.2">
                                                                        <div class="card-options-item-label"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.2.0">
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.2.0.0">руб</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.2.0.1">. / </span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.2.0.2">месяц</span>
                                                                        </div>
                                                                        <div class="card-options-item-value"
                                                                             data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.0.2.1">
                                                                            65 000
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="card-info"
                                                                     data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1">
                                                                    <div class="card-info-item card-info-item-price"
                                                                         data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.0">
                                                                        <span class="card-price"
                                                                              data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.0.0">
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.0.0.0">65 000</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.0.0.1"> </span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.0.0.2">руб</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.0.0.3">.</span>
                                                                        </span>
                                                                    </div>
                                                                    <div class="card-info-item card-info-item-space"
                                                                         data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.1">
                                                                        <span class="card-space"
                                                                              data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.1.0">
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.1.0.0">3-комн.</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.1.0.1">, </span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.1.0.2">74</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.1.0.3">&nbsp;</span>
                                                                            <span
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.1.0.4">м</span>
                                                                            <sup
                                                                                data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.1.1.0.5">2</sup>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <h4 class="card-title"
                                                                    data-reactid=".1vz5g377mdc.2.1.0.1.0.0.0.1:1:$9169.0.0.0.1.2">
                                                                    Большая трешка с отличным свежим ремонтом</h4>
                                                                <div class="card-metro">
                                                                    <span>Волжская, Кузьминки</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
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