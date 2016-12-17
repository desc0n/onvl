<div class="layout">
    <?= View::factory('header'); ?>
    <div class="header-hero">
        <div class="header-cover"></div>
        <div class="header-main">
            <div class="header-main-cell">
                <div class="container-fluid">
                    <h1 class="header-main-title">Аренда без посредников</h1>
                    <div class="header-main-search-form">
                        <div>
                            <div class="search-form">
                                <div class="row">
                                    <div class="col-lg-5 col-sm-12 col-xs-12 col-md-5">
                                        <div class="col-lg-6 col-sm-12  col-xs-12 col-md-6 search-form-title">
                                            Количество комнат
                                        </div>
                                        <div
                                            class="col-lg-6 col-sm-12  col-xs-12 col-md-6 search-form-checkbox-btn-group text-center">
                                            <span class="btn-group">
                                            <label class="btn btn-default">
                                                <input class="search-form-checkbox-control" type="checkbox" value="1">
                                                <span class="search-form-checkbox-content">1</span>
                                            </label>
                                            <label class="btn btn-default">
                                                <input class="search-form-checkbox-control" type="checkbox" value="2">
                                                <span class="search-form-checkbox-content">2</span>
                                            </label>
                                            <label class="btn btn-default">
                                                <input class="search-form-checkbox-control" type="checkbox" value="3">
                                                <span class="search-form-checkbox-content">3</span>
                                            </label>
                                            <label class="btn btn-default">
                                                <input class="search-form-checkbox-control" type="checkbox" value="4">
                                                <span class="search-form-checkbox-content">4+</span>
                                            </label>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-sm-12 col-xs-12 col-md-5">
                                        <div class="col-lg-3 col-sm-12  col-xs-12 col-md-3 search-form-title">
                                            Цена от
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4">
                                            <input type="text" class="form-control" placeholder="0">
                                        </div>
                                        <div class="col-lg-1 col-sm-12 col-xs-12 col-md-1 search-form-title">
                                            до
                                        </div>
                                        <div class="col-lg-4 col-sm-12 col-xs-12 col-md-4">
                                            <input type="text" class="form-control" placeholder="0">
                                        </div>
                                    </div>
                                    <p class="hidden-lg hidden-md">&nbsp;</p>
                                    <div class="col-lg-2 col-sm-12 col-xs-12 col-md-2 search-form-btn-block">
                                        <button
                                            class="btn button-blue search-form-btn col-lg-12 col-sm-12 col-xs-12 col-md-12"
                                            onclick="window.location.href='/search'">Найти
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row page-content">
        <div class="col-md-offset-2 col-lg-offset-2 col-md-8 col-lg-8">
            <?= Arr::get($pageData, 'content'); ?>
        </div>
    </div>
    <?= View::factory('footer'); ?>
</div>
