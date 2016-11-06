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
});