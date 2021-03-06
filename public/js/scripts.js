$(document).ready(function() {
    var districts = [
        '3-я (третья) Рабочая',
        '6-й (шестой) километр',
        '64-й (шестьдесят четвертый) микрорайон',
        '71-й (семьдесят первый) микрорайон',
        'Академгородок',
        'Артур (бухта Улисс)',
        'БАМ',
        'Баляева',
        'Весенняя',
        'Водохранилище Пионерское',
        'Воевода',
        '2-я (вторая) речка',
        'Выселковая',
        'Гоголя',
        'Голубинка',
        'Горностай',
        'Дальхимпром',
        'Дворец культуры моряков',
        'Диомид',
        'Днепровская',
        'Емар',
        'Жигур',
        'Заря',
        'Зеленый угол',
        'Змеинка',
        'Инструментальный завод',
        'Камская',
        'Кирова',
        'Комсомольская',
        'Котельникова',
        'Луговая',
        'Льва Толстого',
        'Мальцевская',
        'Маяк',
        'Моргородок',
        'Морское кладбище',
        'Набережная',
        'Некрасовская',
        'Окатовая',
        'Океанская',
        'Патрокл',
        'Первая речка',
        'Подножье',
        'Поспелово',
        'Постышева',
        'Рыбачий',
        'Рыбный порт',
        'Рында',
        'Сабанеева',
        'Садгород',
        'Санаторная',
        'Седанка',
        'Снеговая',
        'Спутник',
        'Станция Мыс Чуркин',
        '100-е (столетие) Владивостока',
        'Тавайза',
        'Техучилище',
        'Тихая',
        'Трампарк',
        'Трудовая',
        'Трудовое',
        'Угольная',
        'Фокина',
        'Фуникулер',
        'Хабаровская',
        'Центр города',
        'Цирк',
        'Чайка',
        'Чуркин',
        'Шамора',
        'Шилкинская',
        'Школьная',
        'Экипажный',
        'пионерский лагерь Океан'
    ];

    $('.search-form input[type=text][name=district]').typeahead({
        source: districts
    });

    $('.filter-extra-trigger').click(function () {
        if($('.filter-extra-body').css('display') == 'none') {
            $('.filter-extra-body').show('slow');
            $(this).parent().addClass('__open');
        } else {
            $('.filter-extra-body').hide('slow');
            $(this).parent().removeClass('__open');
        }
    });

    $('#regBtn').click(function () {
        var username = $('#regForm #username').val();
        var email = $('#regForm #email').val();
        var password = $('#regForm #password').val();
        var rePassword = $('#regForm #rePassword').val();

        if (username == '') {
            alert('Не указан логин!');

            return false;
        }

        if (!isValidEmailAddress(email)) {
            alert('Некорректный адрес электронной почты!');

            return false;
        }

        if (password != rePassword) {
            alert('Пароли не совпадают!');

            return false;
        }

        if (checkIssetUsername(username) == 1) {
            alert('Такой логин существует!');

            return false;
        }

        if (checkIssetEmail(email) == 1) {
            alert('Такая почта существует!');

            return false;
        }

        $.post(
            '/ajax/registration',
            {username: username, email: email, password: password},
            function () {
                location.reload();
            }
        );
    });

    $('.form-offer #findCoordBtn').click(function () {
        $.get('/ajax/find_address_coords', {address : $('#address').val()}, function(response) {
            var data = JSON.parse(response);

            if (data.result == 'success') {
                var properties = [];
                var coords = new Object();

                coords["lat"] = data.latitude;
                coords["lon"] = data.longitude;

                properties.unshift(coords);

                $('.address-label .validate-form .glyphicon').remove();
                $('.address-label .validate-form').append('<i class="glyphicon glyphicon-ok"></i>');
                $('.address-error').html('');
                $('#findCoordBtn').removeClass('btn-danger');
                $('.form-offer #latitude').val(data.latitude);
                $('.form-offer #longitude').val(data.longitude);
                rewriteYandexMap(properties);
            } else {
                $('.address-label .validate-form .glyphicon').remove();
                $('.address-label .validate-form').append('<i class="glyphicon glyphicon-remove"></i>');

                $('.form-offer #latitude').val('');
                $('.form-offer #longitude').val('');
                $('.address-error').html('<div class="text-center">Адрес не определен</div>');
                $('#findCoordBtn').addClass('btn-danger');
                alert('Ошибка в определении координат адреса!');
            }
        });
    });

    $('.form-offer #newNoticeBtn').click(function () {
        $(this).attr('disabled', 'disabled');

        if ($('.address-label .validate-form .glyphicon-remove').length) {
            alert('Координаты адреса не определены!');
            $(this).removeAttr('disabled');

            return false;
        }

        if ($('.validate-form .glyphicon-remove').length) {
            alert('Заполнены не все обязательные поля!');
            $(this).removeAttr('disabled');

            return false;
        }

        var param = [];
        var checkedParams = $('.param-list input[type=checkbox]:checked');

        for (i = 0;i < checkedParams.length; i++) {
            param[i] = checkedParams[i].value;
        }

        $.post(
            '/ajax/add_notice',
            {
                type : $('.form-offer #type').val(),
                area : $('.form-offer #area').val(),
                address : $('.form-offer #address').val(),
                floor : $('.form-offer #floor').val(),
                longitude : $('.form-offer #longitude').val(),
                latitude : $('.form-offer #latitude').val(),
                name : $('.form-offer #name').val(),
                price : $('.form-offer #price').val(),
                description : $('.form-offer #description').val(),
                phone : $('.form-offer #phone').val(),
                param: param
            },
            function (response) {
                var data = JSON.parse(response);

                loadImages(data.id);
            }
        );
    });

    $('.form-offer #redactNoticeBtn').click(function () {
        $(this).attr('disabled', 'disabled');

        if ($('.address-label .validate-form .glyphicon-remove').length) {
            alert('Координаты адреса не определены!');
            $(this).removeAttr('disabled');

            return false;
        }

        if ($('.validate-form .glyphicon-remove').length) {
            alert('Заполнены не все обязательные поля!');
            $(this).removeAttr('disabled');

            return false;
        }

        var param = [];
        var checkedParams = $('.param-list input[type=checkbox]:checked');

        for (i = 0;i < checkedParams.length; i++) {
            param[i] = checkedParams[i].value;
        }

        $.post(
            '/ajax/set_notice',
            {
                redact_notice: $('#itemId').val(),
                type : $('.form-offer #type').val(),
                area : $('.form-offer #area').val(),
                address : $('.form-offer #address').val(),
                floor : $('.form-offer #floor').val(),
                longitude : $('.form-offer #longitude').val(),
                latitude : $('.form-offer #latitude').val(),
                name : $('.form-offer #name').val(),
                price : $('.form-offer #price').val(),
                description : $('.form-offer #description').val(),
                phone : $('.form-offer #phone').val(),
                param: param
            },
            function (response) {
                var data = JSON.parse(response);

                loadImages(data.id);
            }
        );
    });

    $('.form-offer #address').on('keyup', function () {
        $('.address-label .validate-form .glyphicon').remove();
        $('.address-label .validate-form').append('<i class="glyphicon glyphicon-remove"></i>');
        $('.form-offer #longitude').val('');
        $('.form-offer #latitude').val('');
        $('#findCoordBtn').addClass('btn-danger');
        $('.address-error').html('<div class="text-center">Адрес не определен</div>');
        myMap.geoObjects.each(function(obj){
            myMap.geoObjects.remove(obj);
        });
    });

    $('.form-offer #name').on('keyup blur focus', function () {
        if($(this).val().length > 1) {
            $('.name-label .validate-form .glyphicon').remove();
            $('.name-label .validate-form').append('<i class="glyphicon glyphicon-ok"></i>');
        } else {
            $('.name-label .validate-form .glyphicon').remove();
            $('.name-label .validate-form').append('<i class="glyphicon glyphicon-remove"></i>');
        }
    });

    $('.form-offer #description').on('keyup blur focus', function () {
        if($(this).val().length > 1) {
            $('.description-label .validate-form .glyphicon').remove();
            $('.description-label .validate-form').append('<i class="glyphicon glyphicon-ok"></i>');
        } else {
            $('.description-label .validate-form .glyphicon').remove();
            $('.description-label .validate-form').append('<i class="glyphicon glyphicon-remove"></i>');
        }
    });

    $('.form-offer #type').on('change', function () {
        if($(this).val() != '') {
            $('.type-label .validate-form .glyphicon').remove();
            $('.type-label .validate-form').append('<i class="glyphicon glyphicon-ok"></i>');
        } else {
            $('.type-label .validate-form .glyphicon').remove();
            $('.type-label .validate-form').append('<i class="glyphicon glyphicon-remove"></i>');
        }
    });

    $('.form-offer #phone').on('keyup blur focus', function () {
        if(isValidPhone($(this).val())) {
            $('.phone-label .validate-form .glyphicon').remove();
            $('.phone-label .validate-form').append('<i class="glyphicon glyphicon-ok"></i>');
        } else {
            $('.phone-label .validate-form .glyphicon').remove();
            $('.phone-label .validate-form').append('<i class="glyphicon glyphicon-remove"></i>');
        }
    });

    if ($('#filter-form').length) {
        inProgress = false;
        row = 1;
        page = 1;

        $(window).scroll(function () {
            if ($(window).scrollTop() + $(window).height() >= $(document).height() - 200 && !inProgress) {
                findSearchCardsNotices();
            }
        });
    }
});

function isValidEmailAddress(email) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(email);
}

function isValidPhone(phone) {
    var pattern = new RegExp(/^[+7]{2}\d{10}$/i);
    return pattern.test(phone);
}

function checkIssetUsername(username) {
    return $.ajax({url: '/ajax/check_isset_username', data: {username: username}, type: 'POST', async: false}).responseText;
}

function checkIssetEmail(email) {
    return $.ajax({url: '/ajax/check_isset_email', data: {email: email}, type: 'POST', async: false}).responseText;
}

function loadImages(id) {
    var $input = $("#uploadImages");
    var fd = new FormData;

    for (i = 0; i < $input.prop('files').length; i++) {
        fd.append('imgname[]', $input.prop('files')[i]);
    }

    fd.append('id', id);

    $.ajax({
        url: '/ajax/load_images',
        data: fd,
        processData: false,
        contentType: false,
        type: 'POST'
    }).done(function () {
        if ($('#redactNoticeBtn').length) {
            location.reload();
        }

        showErrorModal('Уведомление', '<div class="alert alert-success"><strong>Операция успешно выполнена!</strong> Запрос отправлен.</div>')
    });
}
function findSearchCardsNotices() {
    var type = [];
    var checkedTypes = $('.filter-type:checked');

    for (i = 0;i < checkedTypes.length; i++) {
        type[i] = checkedTypes[i].value;
    }

    var param = [];
    var checkedParams = $('.filter-param:checked');

    for (i = 0;i < checkedParams.length; i++) {
        param[i] = checkedParams[i].value;
    }

    $.ajax({
        url: '/ajax/find_search_cards_notices',
        method: 'POST',
        data: {
            "row": row,
            "page": page,
            "price_from": $('#filter-form #price_from').val(),
            "price_to": $('#filter-form #price_to').val(),
            "area_from": $('#filter-form #area_from').val(),
            "area_to": $('#filter-form #area_to').val(),
            "floor": $('#filter-form #floor').val(),
            "type": type,
            "param": param
        },
        beforeSend: function () {
            inProgress = true;
        }
    }).done(function (data) {
        data = jQuery.parseJSON(data);

        if (data.result.length > 0) {
            $.each(data.result, function (index, data) {
                $("#cards").append(generateCardNoticeTemplate(data));
            });

            inProgress = false;
            row += 2;
            page += 1;
        }
    });
}
function generateCardNoticeTemplate(data) {
    var yandexMapProperties = [];

    var html = '<div class="cards-list row">';

    $.each(data, function (index, data) {
        html += '<div class="card col-sm-12 col-lg-4">' +
            '<div class="card-inner">' +
            '<a class="card-link" href="/notice/' + data.id + '" target="_blank">' +
            '<div class="card-content">' +
            '<figure class="card-pic">' +
            '<img class="card-pic-img" src="' + data.main_thumb_img_src + '" alt="' + data.name + '">' +
            '<div class="card-pic-bg" style="background-image:url(' + data.main_thumb_img_src + ');">' +
            '</div>' +
            '<div class="card-pic-overlay"></div>' +
            '</figure>' +
            '<div class="card-desc">' +
            '<div class="card-options">' +
            '<div class="card-options-item">' +
            '<div class="card-options-item-label">' +
            'Комнат' +
            '</div>' +
            '<div class="card-options-item-value">' +
            data.room_count +
            '</div>' +
            '</div>' +
            '<div class="card-options-item">' +
            '<div class="card-options-item-label">' +
            '<span>Площадь</span>' +
            '<span>, </span>' +
            '<span>м</span>' +
            '<sup>2</sup>' +
            '</div>' +
            '<div class="card-options-item-value">' +
            data.area +
            '</div>' +
            '</div>' +
            '<div class="card-options-item">' +
            '<div class="card-options-item-label">' +
            '<span>руб</span>' +
            '<span>. / </span>' +
            '<span>месяц</span>' +
            '</div>' +
            '<div class="card-options-item-value">' +
            data.price +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="card-info">' +
            '<div class="card-info-item card-info-item-price">' +
            '<span class="card-price">' +
            '<span>' + data.price + '</span>' +
            '<span> </span>' +
            '<span>руб</span>' +
            '<span>.</span>' +
            '</span>' +
            '</div>' +
            '<div class="card-info-item card-info-item-space">' +
            '<span class="card-space">' +
            '<span>' + data.type_name + '</span>' +
            '<span>, </span>' +
            '<span>' + data.area + '</span>' +
            '<span>&nbsp;</span>' +
            '<span>м</span>' +
            '<sup>2</sup>' +
            '</span>' +
            '</div>' +
            '</div>' +
            '<h4 class="card-title">' + data.description + '</h4>' +
            '<div class="card-metro">' +
            '<span>' + data.address + '</span>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</a>' +
            '</div>' +
            '</div>';

        if (data.latitude != '' && data.longitude != '') {
            var coords = new Object();
            coords["lat"] = data.latitude;
            coords["lon"] = data.longitude;

            yandexMapProperties.unshift(coords);
        }
    });

    html += '</div>';

    rewriteYandexMap(yandexMapProperties);

    return html;
}
function rewriteYandexMap(properties) {
    jQuery.each(properties,function(e, f){
        var placemark = new ymaps.Placemark([f.lat, f.lon], {
        });

        myMap.geoObjects.add(placemark);
    });
}
function showErrorModal(label, body) {$('#errorModal #errorModalLabel').html(label);$('#errorModal #errorModalBody').html(body);$('#errorModal').modal('toggle');}
function redactNoticeImg(id, src){$('#redactImgModal .modal-body').html('').append('<img src="/public/img/thumb/' + src + '" data-id="' + id + '">');$('#redactImgModal').modal('toggle');}
function removeNoticeImg(){var id = $('#redactImgModal .modal-body img').data('id');$.ajax({url: '/ajax/remove_notice_img', type: 'POST', data: {id: id}, async: true}).done(function () {$('#redactImgModal').modal('toggle');$('#noticeImg' + id).remove();});}
function getOwnerPhone(id){$.ajax({url: '/ajax/get_owner_phone', type: 'POST', data: {id: id}, async: true}).done(function (phone) {$('#ownerPhoneModalBody').html(phone);$('#ownerPhoneModal').modal('toggle');});}
function addToLikedNotices(id){$.ajax({url: '/ajax/add_to_liked_notices', type: 'POST', data: {id: id}, async: true}).done(function () {showErrorModal('Уведомление', '<div class="alert alert-success"><strong>Операция успешно выполнена!</strong> Объявление добавлено в избранное.</div>')});}
function removeUserNotice(){$.ajax({url: '/ajax/remove_user_notice', type: 'POST', data: {id: $('#itemId').val()}, async: true}).done(function () {document.location='/';});}
function removeFromLiked(id){$.ajax({url: '/ajax/remove_from_liked_notices', type: 'POST', data: {id: id}, async: true}).done(function () {$('#liked' + id).remove();});}