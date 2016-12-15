<div class="layout">
    <header class="header">
        <div class="header-navbar">
            <div class="container">
                <div class="header-navbar-logo">
                    <a class="logo" href="/">
                    </a>
                </div>
                <h1 class="header-navbar-lead">Добавить объявление.</h1>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="container">
            <div class="form form-offer">
                <div class="form-step">
                    <div class="form-row">
                        <div class="form-row-label address-label">
                            Введите адрес
                            <div class="validate-form">
                                <i class="glyphicon glyphicon-remove"></i>
                            </div>
                        </div>
                        <div class="form-row-content">
                            <div class="input input-group">
                                <input placeholder="Например, Русская, 7" class="form-control">
                                <span class="input-group-btn">
                                    <button class="btn btn-default">
                                        <i class="glyphicon glyphicon-search" title="Найти координаты"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-step">
                    <div class="form-row">
                        <div class="form-row-label">
                            Заголовок
                            <div class="validate-form">
                                <i class="glyphicon glyphicon-remove"></i>
                            </div>
                        </div>
                        <div class="form-row-content">
                            <div class="input">
                                <input class="form-control" placeholder="Например: «Трёшка на Русской»." type="text" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-label">
                            Описание
                            <div class="validate-form">
                                <i class="glyphicon glyphicon-remove"></i>
                            </div>
                        </div>
                        <div class="form-row-content">
                            <div class="textarea">
                                <textarea class="form-control" name="description">

                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-label">Фотографии</div>
                        <div class="form-row-content">
                            <div class="uploadzone dropzone-previews">
                                <div class="uploadzone-content">
                                    <input type="file" name="imgname[]" id="exampleInputFile" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-step">
                    <div class="form-row" data-switch-block="apartment">
                        <div class="form-row-label">
                            Тип квартиры
                            <div class="validate-form">
                                <i class="glyphicon glyphicon-remove"></i>
                            </div>
                        </div>
                        <div class="form-row-content">
                            <?=Form::select('type', ([null=> 'не выбрано'] + $types), null, ['class' => 'form-control']);?>
                        </div>
                    </div>
                    <div class="form-row form-row-options">
                        <div class="form-row-label">Параметры</div>
                        <div class="form-row-content">
                            <div class="grid">
                                <div class="grid-item grid-item-option grid-item-option-area">
                                    <label class="control-label">Площадь квартиры</label>
                                    <div class="input input-option input-inline">
                                        <input class="form-control" type="text" name="area" value="0">
                                    </div>
                                    <span class="form-text">м<sup>2</sup>
                                    </span>
                                </div>
                                <div class="grid-item grid-item-option grid-item-option-floor">
                                    <label class="control-label">Этаж</label>
                                    <div class="input input-option input-inline">
                                        <input class="form-control" type="text" name="floor" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-label">Цена в месяц</div>
                        <div class="form-row-content">
                            <div class="input input-inline input-price">
                                <input class="form-control" placeholder="0" type="text" name="price">
                            </div>
                            <span class="form-text">руб</span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-label">
                            Телефон
                            <div class="validate-form">
                                <i class="glyphicon glyphicon-remove"></i>
                            </div>
                        </div>
                        <div class="form-row-content">
                            <div>
                                <div class="input">
                                    <input class="form-control" placeholder="+7" type="text" name="phone">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-row-content">
                            <button name="button" id="newNoticeBtn" class="button button-blue button-xl">Отправить на модерацию
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?=View::factory('footer');?>
</div>