<form id="ad-form" class="new_ad" enctype="multipart/form-data" action="/rooms" accept-charset="UTF-8" method="post">

    <div class="layout">
        <header class="header">
            <div class="header-navbar">
                <div class="container">
                    <div class="header-navbar-logo">
                        <a class="logo" href="/">

                        </a>
                    </div>
                    <h1 class="header-navbar-lead">Разместите объявление. <span>Это бесплатно</span>
                    </h1>
                </div>
            </div>
        </header>
        <div class="content">
            <div class="container">
                <div class="form form-offer">
                    <input type="hidden" value="long" name="ad[period_kind]"
                           id="ad_period_kind">
                    <div class="form-step">
                        <div class="form-row">
                            <div class="form-row-label">Выберите что вы сдаете</div>
                            <div class="form-row-content">
                                <div class="radio-group radio-group-two-cols radio-group-offerkind __success">
                                    <label class="radio radio-flat">
                                        <input class="radio-control" data-switch-target="room" required="required" type="radio" value="room" name="ad[kind]" id="ad_kind_room">
                                        <span class="radio-content">
                                            <i class="radio-icon radio-icon-room">

                                            </i>
                                            <span class="radio-text">Комнату</span>
                                        </span>
                                    </label>
                                    <label class="radio radio-flat">
                                        <input class="radio-control __error" data-switch-target="apartment" required="required" type="radio" value="apartment" name="ad[kind]" id="ad_kind_apartment">
                                        <span class="radio-content">
                                            <i class="radio-icon radio-icon-apartment">

                                            </i>
                                            <span class="radio-text">Квартиру</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-step">
                        <div class="form-row">
                            <div class="form-row-label">Введите адрес</div>
                            <div class="form-row-content">
                                <div class="input input-search">
                                    <label class="input-icon input-icon-magnifier" for="ad_address">

                                    </label>
                                    <input placeholder="Например, Русская, 7" class="input-control">
                                    <i class="necessary">

                                    </i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-step">
                        <div class="form-row">
                            <div class="form-row-label">Заголовок</div>
                            <div class="form-row-content">
                                <div class="input">
                                    <input class="input-control" placeholder="Например: «Трёшка на Русской»." type="text" name="ad[title]" id="ad_title">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-row-label">Описание</div>
                            <div class="form-row-content" ls-footnote-parent="">
                                <div class="textarea">
                                    <textarea class="textarea-control" placeholder="Подробное описание – это обязательный параметр объявления. Если не знаете что писать, воспользуйтесь подсказкой на зеленом фоне" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 122px;">

                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-row-label">Фотографии</div>
                            <div class="form-row-content">
                                <div class="uploadzone dropzone-previews">
                                    <div class="uploadzone-content">
                                        <input type="hidden" name="dropzone_files" id="dropzone_files" class="hide">
                                        <i class="uploadzone-icon uploadzone-icon-photo"></i>
                                        <div class="uploadzone-desc">Выберите файл на своём компьютере или просто переместите сюда фотографии
                                        </div>
                                        <div class="uploadzone-buttons">
                                            <label class="uploadzone-button" for="ad_fileupload">Выбрать фотографии</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-step">
                        <div class="form-row" data-switch-block="apartment">
                            <div class="form-row-label">Количество комнат</div>
                            <div class="form-row-content">
                                <div class="radio-group">
                                    <label class="radio radio-flat">
                                        <input
                                            class="radio-control __success" type="radio" value="1"
                                            name="ad[rooms_number]" id="ad_rooms_number_1">
                                        <span
                                            class="radio-content">
                                            <span class="radio-text">1</span>
                                        </span>
                                    </label>
                                    <label
                                        class="radio radio-flat">
                                        <input class="radio-control __success" type="radio"
                                               value="2" name="ad[rooms_number]"
                                               id="ad_rooms_number_2">
                                        <span
                                            class="radio-content">
                                            <span class="radio-text">2</span>
                                        </span>
                                    </label>
                                    <label
                                        class="radio radio-flat">
                                        <input class="radio-control __success" type="radio"
                                               value="3" name="ad[rooms_number]"
                                               id="ad_rooms_number_3">
                                        <span
                                            class="radio-content">
                                            <span class="radio-text">3</span>
                                        </span>
                                    </label>
                                    <label
                                        class="radio radio-flat">
                                        <input class="radio-control __success" type="radio"
                                               value="4" name="ad[rooms_number]"
                                               id="ad_rooms_number_4">
                                        <span
                                            class="radio-content">
                                            <span class="radio-text">4+</span>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row form-row-options">
                            <div class="form-row-label">Параметры</div>
                            <div class="form-row-content">
                                <div class="grid">
                                    <div class="grid-item grid-item-option grid-item-option-area">
                                        <label
                                            class="control-label" data-switch-block="apartment" for="ad_area">Площадь
                                            квартиры</label>
                                        <label class="control-label __hide" data-switch-block="room"
                                               for="ad_area">Площадь комнаты</label>
                                        <div class="input input-option input-inline">
                                            <input
                                                class="input-control" ls-auto-numeric-area="" id="ad_areas" type="text"
                                                name="ad[area]">
                                        </div>
                                        <span class="form-text">м<sup>2</sup>
                                        </span>
                                    </div>
                                    <div class="grid-item grid-item-option grid-item-option-floor">
                                        <label
                                            class="control-label" for="ad_floor">Этаж</label>
                                        <div class="input input-option input-inline">
                                            <input
                                                class="input-control" ls-auto-numeric-floor="" type="text"
                                                name="ad[floor]" id="ad_floor">
                                        </div>
                                        <span class="form-text">/</span>
                                    </div>
                                    <div class="grid-item grid-item-option grid-item-option-floors">
                                        <label
                                            class="control-label" for="ad_floors_number">Этажей в доме</label>
                                        <div class="input input-option input-inline">
                                            <input
                                                class="input-control" ls-auto-numeric-floor="" type="text"
                                                name="ad[floors_number]" id="ad_floors_number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-row-label">Цена в месяц</div>
                            <div class="form-row-content">
                                <input value="month" type="hidden"
                                       name="ad[price_unit]"
                                       id="ad_price_unit">
                                <div class="input input-inline input-price">
                                    <input class="input-control" placeholder="0" type="text">
                                </div>
                                <span class="form-text">руб</span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-row-label">Телефон</div>
                            <div class="form-row-content">
                                <div ls-footnote-parent="">
                                    <div class="input">
                                        <input class="input-control" placeholder="+7" data-footnote-text="Наши модераторы позвонят Вам для проверки квартиры. Пожалуйста, будьте на связи." type="text">
                                    </div>
                                </div>
                                <div class="footnote footnote-static hidden-lg">
                                    <div class="footnote-content">Наши модераторы позвонят Вам для проверки квартиры.
                                        Пожалуйста, будьте на связи.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row form-row-actions">
                            <div class="form-row-content">
                                <button name="button" type="submit" class="button button-blue button-xl">Отправить на модерацию
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?=View::factory('footer');?>
    </div>
</form>