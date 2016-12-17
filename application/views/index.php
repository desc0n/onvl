<div class="layout">
    <?=View::factory('header');?>
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
                                        <div class="col-lg-6 col-sm-12  col-xs-12 col-md-6 search-form-checkbox-btn-group text-center">
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
                                        <button class="btn button-blue search-form-btn col-lg-12 col-sm-12 col-xs-12 col-md-12" onclick="window.location.href='/search'">Найти</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <div class="card col-sm-12 col-lg-3 col-md-3 col-xs-12">
                                <div class="card-inner">
                                    <a class="card-link" href="#" target="_blank">
                                        <div class="card-content">
                                            <figure class="card-pic">
                                                <img class="card-pic-img" src="/public/img/thumb/1.jpg" alt="Трешка в пяти минутах ходьбы от пляжей">
                                                <div class="card-pic-bg" style="background-image:url(/public/img/thumb/1.jpg);"></div>
                                                <div class="card-pic-overlay"></div>
                                                <span></span>
                                            </figure>
                                            <div class="card-desc">
                                                <div class="card-options">
                                                    <div class="card-options-item">
                                                        <div class="card-options-item-label">Комнат</div>
                                                        <div class="card-options-item-value">3</div>
                                                    </div>
                                                    <div class="card-options-item">
                                                        <div class="card-options-item-label">
                                                            <span>Площадь, м</span>
                                                            <sup>2</sup>
                                                        </div>
                                                        <div class="card-options-item-value">85</div>
                                                    </div>
                                                    <div class="card-options-item">
                                                        <div class="card-options-item-label">
                                                            <span>руб</span>
                                                            <span>. / месяц</span>
                                                        </div>
                                                        <div class="card-options-item-value">76 000</div>
                                                    </div>
                                                </div>
                                                <div class="card-info">
                                                    <div class="card-info-item card-info-item-price">
                                                        <span class="card-price">
                                                            <span>76 000</span>
                                                            <span> </span>
                                                            <span>руб</span>
                                                            <span>.</span>
                                                        </span>
                                                    </div>
                                                    <div class="card-info-item card-info-item-space">
                                                        <span class="card-space">
                                                            <span>3-комн.</span>
                                                            <span>, </span>
                                                            <span>85</span>
                                                            <span>&nbsp;м</span>
                                                            <sup>2</sup></span>
                                                    </div>
                                                </div>
                                                <h4 class="card-title">
                                                    Трешка в пяти минутах ходьбы от пляжей</h4>
                                                <div class="card-metro">
                                                    <span>Строгино, Спартак</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card col-sm-12 col-lg-3 col-md-3 col-xs-12" data-reactid=".pjmrs9y0hs.0.$202137">
                                <div class="card-inner" data-reactid=".pjmrs9y0hs.0.$202137.0"><a class="card-link"
                                                                                                  href="/stilnaya-odnushka-090efdde-1029-49dc-a472-7297e0ece1b1"
                                                                                                  target="_blank"
                                                                                                  data-reactid=".pjmrs9y0hs.0.$202137.0.0">
                                        <div class="card-content" data-reactid=".pjmrs9y0hs.0.$202137.0.0.0">
                                            <figure class="card-pic" data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.0"><img
                                                    class="card-pic-img"
                                                    src="https://assets.thelocals.ru/uploads/image/file/1552163/thumb_c8051be5.JPG"
                                                    alt="Стильная однушка."
                                                    data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.0.0">
                                                <div class="card-pic-bg"
                                                     style="background-image:url(https://assets.thelocals.ru/uploads/image/file/1552163/thumb_c8051be5.JPG);"
                                                     data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.0.1"></div>
                                                <div class="card-pic-overlay"
                                                     data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.0.2"></div>
                                                <span data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.0.4"></span></figure>
                                            <div class="card-desc" data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1">
                                                <div class="card-options"
                                                     data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.0">
                                                    <div class="card-options-item"
                                                         data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.0.0">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.0.0.0">Комнат
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.0.0.1">1
                                                        </div>
                                                    </div>
                                                    <div class="card-options-item"
                                                         data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.0.1">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.0.1.0"><span
                                                                data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.0.1.0.0">Площадь, м</span><sup
                                                                data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.0.1.0.1">2</sup>
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.0.1.1">42
                                                        </div>
                                                    </div>
                                                    <div class="card-options-item"
                                                         data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.0.2">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.0.2.0"><span
                                                                data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.0.2.0.0">руб</span><span
                                                                data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.0.2.0.1">. / месяц</span>
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.0.2.1">35 000
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-info" data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.1">
                                                    <div class="card-info-item card-info-item-price"
                                                         data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.1.0"><span
                                                            class="card-price"
                                                            data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.1.0.0"><span
                                                                data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.1.0.0.0">35 000</span><span
                                                                data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.1.0.0.1"> </span><span
                                                                data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.1.0.0.2">руб</span><span
                                                                data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.1.0.0.3">.</span></span>
                                                    </div>
                                                    <div class="card-info-item card-info-item-space"
                                                         data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.1.1"><span
                                                            class="card-space"
                                                            data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.1.1.0"><span
                                                                data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.1.1.0.0">1-комн.</span><span
                                                                data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.1.1.0.1">, </span><span
                                                                data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.1.1.0.2">42</span><span
                                                                data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.1.1.0.3">&nbsp;м</span><sup
                                                                data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.1.1.0.4">2</sup></span>
                                                    </div>
                                                </div>
                                                <h4 class="card-title" data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.2">
                                                    Стильная однушка.</h4>
                                                <div class="card-metro" data-reactid=".pjmrs9y0hs.0.$202137.0.0.0.1.3">
                                                    <span>Румянцево, Саларьево</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card col-sm-12 col-lg-3 col-md-3 col-xs-12" data-reactid=".pjmrs9y0hs.0.$208338">
                                <div class="card-inner" data-reactid=".pjmrs9y0hs.0.$208338.0"><a class="card-link"
                                                                                                  href="/kvartira-ryadom-s-neboskrebami"
                                                                                                  target="_blank"
                                                                                                  data-reactid=".pjmrs9y0hs.0.$208338.0.0">
                                        <div class="card-content" data-reactid=".pjmrs9y0hs.0.$208338.0.0.0">
                                            <figure class="card-pic" data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.0"><img
                                                    class="card-pic-img"
                                                    src="https://assets.thelocals.ru/uploads/image/file/1598054/thumb_22da85c4.jpg"
                                                    alt="Квартира рядом с небоскребами :-)))"
                                                    data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.0.0">
                                                <div class="card-pic-bg"
                                                     style="background-image:url(https://assets.thelocals.ru/uploads/image/file/1598054/thumb_22da85c4.jpg);"
                                                     data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.0.1"></div>
                                                <div class="card-pic-overlay"
                                                     data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.0.2"></div>
                                                <span data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.0.4">

                                                </span>
                                            </figure>
                                            <div class="card-desc" data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1">
                                                <div class="card-options"
                                                     data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1.0">
                                                    <div class="card-options-item"
                                                         data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1.0.0">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1.0.0.0">Комнат
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1.0.0.1">2
                                                        </div>
                                                    </div>
                                                    <div class="card-options-item"
                                                         data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1.0.1">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1.0.1.0">
                                                            <span
                                                                data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1.0.1.0.0">Площадь, м</span>
                                                            <sup
                                                                data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1.0.1.0.1">2</sup>
                                                        </div>
                                                        <div class="card-options-item-value">60
                                                        </div>
                                                    </div>
                                                    <div class="card-options-item"
                                                    >
                                                        <div class="card-options-item-label">
                                                            <span>руб</span>
                                                            <span>. / месяц</span>
                                                        </div>
                                                        <div class="card-options-item-value">75 000</div>
                                                    </div>
                                                </div>
                                                <div class="card-info">
                                                    <div class="card-info-item card-info-item-price">
                                                        <span class="card-price">
                                                            <span>75 000</span>
                                                            <span> </span>
                                                            <span>руб</span>
                                                            <span>.</span>
                                                        </span>
                                                    </div>
                                                    <div class="card-info-item card-info-item-space"
                                                    >
                                                        <span
                                                            class="card-space"
                                                        >
                                                            <span>2-комн.</span>
                                                            <span>, </span>
                                                            <span>60</span>
                                                            <span>&nbsp;м</span>
                                                            <sup>2</sup>
                                                        </span>
                                                    </div>
                                                </div>
                                                <h4 class="card-title">
                                                    Квартира рядом с небоскребами :-)))</h4>
                                                <div class="card-metro">
                                                    <span>Киевская, Деловой центр, Студенческая</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card col-sm-12 col-lg-3 col-md-3 col-xs-12" data-reactid=".pjmrs9y0hs.0.$208338">
                                <div class="card-inner" data-reactid=".pjmrs9y0hs.0.$208338.0"><a class="card-link"
                                                                                                  href="/kvartira-ryadom-s-neboskrebami"
                                                                                                  target="_blank"
                                                                                                  data-reactid=".pjmrs9y0hs.0.$208338.0.0">
                                        <div class="card-content" data-reactid=".pjmrs9y0hs.0.$208338.0.0.0">
                                            <figure class="card-pic" data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.0"><img
                                                    class="card-pic-img"
                                                    src="https://assets.thelocals.ru/uploads/image/file/1598054/thumb_22da85c4.jpg"
                                                    alt="Квартира рядом с небоскребами :-)))"
                                                    data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.0.0">
                                                <div class="card-pic-bg"
                                                     style="background-image:url(https://assets.thelocals.ru/uploads/image/file/1598054/thumb_22da85c4.jpg);"
                                                     data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.0.1"></div>
                                                <div class="card-pic-overlay"
                                                     data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.0.2"></div>
                                                <span data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.0.4">

                                                </span>
                                            </figure>
                                            <div class="card-desc" data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1">
                                                <div class="card-options"
                                                     data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1.0">
                                                    <div class="card-options-item"
                                                         data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1.0.0">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1.0.0.0">Комнат
                                                        </div>
                                                        <div class="card-options-item-value"
                                                             data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1.0.0.1">2
                                                        </div>
                                                    </div>
                                                    <div class="card-options-item"
                                                         data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1.0.1">
                                                        <div class="card-options-item-label"
                                                             data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1.0.1.0">
                                                            <span
                                                                data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1.0.1.0.0">Площадь, м</span>
                                                            <sup
                                                                data-reactid=".pjmrs9y0hs.0.$208338.0.0.0.1.0.1.0.1">2</sup>
                                                        </div>
                                                        <div class="card-options-item-value">60
                                                        </div>
                                                    </div>
                                                    <div class="card-options-item"
                                                    >
                                                        <div class="card-options-item-label">
                                                            <span>руб</span>
                                                            <span>. / месяц</span>
                                                        </div>
                                                        <div class="card-options-item-value">75 000</div>
                                                    </div>
                                                </div>
                                                <div class="card-info">
                                                    <div class="card-info-item card-info-item-price">
                                                        <span class="card-price">
                                                            <span>75 000</span>
                                                            <span> </span>
                                                            <span>руб</span>
                                                            <span>.</span>
                                                        </span>
                                                    </div>
                                                    <div class="card-info-item card-info-item-space"
                                                    >
                                                        <span
                                                            class="card-space"
                                                        >
                                                            <span>2-комн.</span>
                                                            <span>, </span>
                                                            <span>60</span>
                                                            <span>&nbsp;м</span>
                                                            <sup>2</sup>
                                                        </span>
                                                    </div>
                                                </div>
                                                <h4 class="card-title">
                                                    Квартира рядом с небоскребами :-)))</h4>
                                                <div class="card-metro">
                                                    <span>Киевская, Деловой центр, Студенческая</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn button-blue btn-lg" href="/rooms">Посмотреть все</a></div>
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