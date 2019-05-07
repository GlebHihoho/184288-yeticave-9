<?php

$is_auth = rand(0, 1);
$user_name = 'Gleb';

require('./boot.php');

$link = mysqli_connect('localhost', 'root', '12321Glrbct', 'yeticave');

if ($link == false) {
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
} else {
    mysqli_set_charset($link, "utf8");

    $get_categories_sql = 'SELECT * FROM categories';
    $get_categories = mysqli_query($link, $get_categories_sql);
    $categories = mysqli_fetch_all($get_categories, MYSQLI_ASSOC);

    $get_lots_sql =
        'SELECT
            lots.id,
            lots.name as lot_name,
            lots.start_price,
            lots.img_url,
            lots.time_end,
            categories.name as category_name
        FROM lots
        JOIN categories ON categories.id = lots.id
        ORDER BY lots.time_end ASC;';
    $get_lots = mysqli_query($link, $get_lots_sql);
    $lots = mysqli_fetch_all($get_lots, MYSQLI_ASSOC);

    $main_content = include_template('main.php', [
        'categories' => $categories,
        'auction_lots' => $lots
    ]);
    $page_content = include_template('layout.php', [
        'title' => 'Главная',
        'user_name' => $user_name,
        'is_auth' => $is_auth,
        'categories' => $categories,
        'main_content' => $main_content,
    ]);

    print($page_content);
}
