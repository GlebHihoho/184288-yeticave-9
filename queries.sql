INSERT INTO categories (name, code)
  VALUES
    ('Доски и лыжи', 'boards'),
    ('Крепления', 'attachment'),
    ('Ботинки', 'boots')
    ('Одежда', 'clothing'),
    ('Инструменты', 'tools'),
    ('Разное', 'other');


INSERT INTO users (email, name, password, avatar, contact)
  VALUES
    (
      'robert.de.niro@gmail.com',
      'Robert De Niro',
      '7C6A180B36896A0A8C02787EEAFB0E4C',
      'img/avatars/robert_de_niro.jpg',
      'New York City, USA'
    ),
    (
      'jack.nicholson@gmail.com',
      'Jack Nicholson',
      '6CB75F652A9B52798EB6CF2201057C73',
      'img/avatars/jack_nicholson.jpg',
      'Neptune, New Jersey, USA'
    );


INSERT INTO lots (name, description, img_url, start_price, time_end, step_bet, owner_id, category_id)
  VALUES
    ('2014 Rossignol District Snowboard', 'Сноуборд DISTRICT AMPTEK...', 'img/lot-1.jpg', 10999, 1557014400, 100, 1, 1),
    ('DC Ply Mens 2016/2017 Snowboard', 'Новые широкие ростовки в...', 'img/lot-2.jpg', 159999, 1556841600, 500, 1, 1),
    ('Крепления Union Contact Pro 2015 года размер L/XL', 'Невероятно легкие...', 'img/lot-3.jpg', 8000, 1554249600, 50, 2, 1, 2),
    ('Ботинки для сноуборда DC Mutiny Charocal', 'Эти ботинки...', 'img/lot-4.jpg', 10999, 1557446400, 100, 2, 3),
    ('Куртка для сноуборда DC Mutiny Charocal', 'Куртка Phenix Dahlia...', 'img/lot-5.jpg', 7500, 1557878400, 50, 2, 4),
    ('Маска Oakley Canopy', 'Увеличенный объем линзы...', 'img/lot-6.jpg', 5400, 1552608000, 50, 2, 1, 6);

INSERT INTO bets (cost, user_id, lot_id)
  VALUES
    (9000, 1, 3),
    (5500, 1, 6),
    (9500, 2, 3),
    (6000, 2, 6);


-- Получить все категории
SELECT name FROM categories;

-- Получить самые новые, открытые лоты.
-- Каждый лот должен включать название, стартовую цену,
-- ссылку на изображение, цену, название категории;
SELECT lots.name as lot_name, lots.start_price, lots.img_url, categories.name as categori_name, MAX(bets.cost)
FROM lots
JOIN categories ON categories.id = lots.id
JOIN bets ON bets.lot_id = lots.id
WHERE winner_id != NULL
GROUP BY lots.name
ORDER BY lots.time_start DESC;

-- Показать лот по его id. Получите также название категории, к которой принадлежит лот;
SELECT lots.name as lot_name, categories.name as category_name FROM lots
JOIN categories ON categories.id = lots.category_id
WHERE lots.id = 1;

-- Oбновить название лота по его идентификатору;
UPDATE lots SET name = '9000 Rossignol District Snowboard' WHERE lots.id = 1;

-- Получить список самых свежих ставок для лота по его идентификатору;
SELECT id, MAX(cost), user_id, lot_id FROM bets WHERE lot_id = 3;
