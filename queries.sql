INSERT INTO categories (name, code) VALUES('Доски и лыжи', 'boards');
INSERT INTO categories (name, code) VALUES('Крепления', 'attachment');
INSERT INTO categories (name, code) VALUES('Ботинки', 'boots');
INSERT INTO categories (name, code) VALUES('Одежда', 'clothing');
INSERT INTO categories (name, code) VALUES('Инструменты', 'tools');
INSERT INTO categories (name, code) VALUES('Разное', 'other');


INSERT INTO users (email, name, password, avatar, contact)
  VALUES(
      'robert.de.niro@gmail.com',
      'Robert De Niro',
      '7C6A180B36896A0A8C02787EEAFB0E4C',
      'img/avatars/robert_de_niro.jpg',
      'New York City, USA'
    );

INSERT INTO users (email, name, password, avatar, contact)
  VALUES(
      'jack.nicholson@gmail.com',
      'Jack Nicholson',
      '6CB75F652A9B52798EB6CF2201057C73',
      'img/avatars/jack_nicholson.jpg',
      'Neptune, New Jersey, USA'
    );

INSERT INTO lots (name, description, img_url, start_price, time_end, step_bet, owner_id, category_id)
  VALUES(
    '2014 Rossignol District Snowboard',
    'Сноуборд DISTRICT AMPTEK от известного французского производителя ROSSIGNOL, разработанный специально для начинающих фрирайдеров. Эта доска отлично подойдёт как для обычного склона, так и для парка, а также для обучения. В доступном по цене сноуборде DISTRICT AMPTEK применены современные технологии, которые удачно сочетаются, обеспечивая при этом отличные рабочие характеристики и комфорт. Он оптимален для тех, кто хочет быстро повысить свой уровень техники и мастерства. Классическая твин-тип форма позволяет кататься в разных стойках. За устойчивость и стабильность отвечает стандартный прогиб, он гарантирует жесткую хватку кантов. Высокие рокеры Amptek Auto-Turn обеспечивают легкость управления доской и четкое вхождение в повороты.',
    'img/lot-1.jpg',
    10999,
    1557014400,
    100,
    1,
    1
  );

INSERT INTO lots (name, description, img_url, start_price, time_end, step_bet, owner_id, category_id)
  VALUES(
    'DC Ply Mens 2016/2017 Snowboard',
    'Новые широкие ростовки в линейке Ply не оставят никого равнодушным! Маневренность и легкость скейтбординга на снегу теперь доступна всем без исключения!',
    'img/lot-2.jpg',
    159999,
    1556841600,
    500,
    1,
    1
  );

INSERT INTO lots (name, description, img_url, start_price, time_end, step_bet, owner_id, winner_id, category_id)
  VALUES(
    'Крепления Union Contact Pro 2015 года размер L/XL',
    'Невероятно легкие универсальные крепления весом всего 720 грамм готовы порадовать прогрессирующих райдеров, практикующих как трассовое катание, так и взрывные спуски в паудере. Легкая нейлоновая база в сочетании с очень прочным хилкапом, выполненным из экструдированного алюминия, выдержит серьезные нагрузки, а бакли, выполненные из магния не только заметно снижают вес, но и имеют плавный механизм. Система стрепов 3D Connect обеспечивает равномерное давление на верхнюю часть ноги, что несомненно добавляет комфорта как во время выполнения трюков, так и во время катания в глубоком снегу.',
    'img/lot-3.jpg',
    8000,
    1554249600,
    50,
    2,
    1,
    2
  );

INSERT INTO lots (name, description, img_url, start_price, time_end, step_bet, owner_id, category_id)
  VALUES(
    'Ботинки для сноуборда DC Mutiny Charocal',
    'Эти ботинки созданы для фристайла и для того, чтобы на любом споте Вы чувствовали себя как дома в уютных тапочках, в которых Вы будете также прекрасно чувствовать свою доску, как ворсинки на любимом коврике около дивана. Каучуковая стелька Impact S погасит нежелательные вибрации и смягчит приземления, внутренник White Liner с запоминающим форму ноги наполением и фиксирующим верхним стрепом добавит эргономики в посадке, а традиционная шнуровка с блокирующими верхними крючками поможет идеально подогнать ботинок по ноге, тонко фиксируя натяжение шнурков.',
    'img/lot-4.jpg',
    10999,
    1557446400,
    100,
    2,
    3
  );

INSERT INTO lots (name, description, img_url, start_price, time_end, step_bet, owner_id, category_id)
  VALUES(
    'Куртка для сноуборда DC Mutiny Charocal',
    'Куртка Phenix Dahlia с настоящим мехом отличается роскошным внешним видом и высоким уровнем комфорта, специально для женщин, обладающих бескомпромиссно хорошим вкусом. Мембрана Dermizax EV защитит вас от снега, ветра и мороза во время катания или отдыха после. Четырехсторонний стрейч в сочетании с эргономичным дизайном позволит вам беспрепятственно двигаться, сохраняя при этом силуэт. Потрясающее утепление из сочетания пуха и ThunderonDigenite Thermo. Капюшон оформлен натуральным мехом енота. Вся женская одежда Phenix отличается идеальной посадкой по фигуре и легкостью за счет эргономичного трехмерного кроя при помощи лазера.',
    'img/lot-5.jpg',
    7500,
    1557878400,
    50,
    2,
    4
  );

INSERT INTO lots (name, description, img_url, start_price, time_end, step_bet, owner_id, winner_id, category_id)
  VALUES(
    'Маска Oakley Canopy',
    'Увеличенный объем линзы и низкий профиль оправы маски Canopy способствуют широкому углу обзора, а специальное противотуманное покрытие поможет ориентироваться в условиях плохой видимости. Технология вентиляции O-Flow Arch и прослойка из микрофлиса сделают покорение горных склонов более комфортным.',
    'img/lot-6.jpg',
    5400,
    1552608000,
    50,
    2,
    1,
    6
  );


INSERT INTO bets (cost, user_id, lot_id)
  VALUES(
    9000,
    1,
    3
  );

INSERT INTO bets (cost, user_id, lot_id)
  VALUES(
    5500,
    1,
    6
  );


-- Получить все категории
SELECT name FROM categories;

-- Получить самые новые, открытые лоты.
-- Каждый лот должен включать название, стартовую цену,
-- ссылку на изображение, цену, название категории;
SELECT lots.name, lots.start_price, lots.img_url, categories.name
FROM lots
JOIN categories ON categories.id = lots.id
WHERE winner_id != NULL;

-- Показать лот по его id. Получите также название категории, к которой принадлежит лот;
SELECT lots.name as lot_name, categories.name as category_name FROM lots
JOIN categories ON categories.id = lots.category_id
WHERE lots.id = 1;

-- Oбновить название лота по его идентификатору;
UPDATE lots SET name = '9000 Rossignol District Snowboard' WHERE lots.id = 1;

-- Получить список самых свежих ставок для лота по его идентификатору;
SELECT * FROM bets WHERE bet.id = 1;
