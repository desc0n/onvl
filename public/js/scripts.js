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

    $('#newNoticeBtn').click(function () {
        if ($('.address-label .validate-form .glyphicon-remove').length) {
            alert('Координаты адреса не определены!');

            return false;
        }
    });
});

function isValidEmailAddress(email) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(email);
}

function checkIssetUsername(username) {
    return $.ajax({url: '/ajax/check_isset_username', data: {username: username}, type: 'POST', async: false}).responseText;
}

function checkIssetEmail(email) {
    return $.ajax({url: '/ajax/check_isset_email', data: {email: email}, type: 'POST', async: false}).responseText;
}