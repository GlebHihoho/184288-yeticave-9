<?php

$is_auth = rand(0, 1);
$user_name = 'Gleb';

$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];
$auction_lots = [
    [
        'title' => '2014 Rossignol District Snowboard',
        'category' => $categories[0],
        'cost' => 10999,
        'url' => 'img/lot-1.jpg'
    ],
    [
        'title' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => $categories[0],
        'cost' => 159999,
        'url' => 'img/lot-2.jpg'
    ],
    [
        'title' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => $categories[1],
        'cost' => 8000,
        'url' => 'img/lot-3.jpg'
    ],
    [
        'title' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => $categories[2],
        'cost' => 10999,
        'url' => 'img/lot-4.jpg'
    ],
    [
        'title' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => $categories[3],
        'cost' => 7500,
        'url' => 'img/lot-5.jpg'
    ],
    [
        'title' => 'Маска Oakley Canopy',
        'category' => $categories[5],
        'cost' => 5400,
        'url' => 'img/lot-6.jpg'
    ]
];

require('./boot.php');

$main_content = include_template('main.php', [
    'categories' => $categories,
    'auction_lots' => $auction_lots,
    'is_finishing_lot' => $is_finishing_lot,
    'time_to_finishing' => $time_to_finishing
]);
$page_content = include_template('layout.php', [
    'title' => 'Главная',
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'categories' => $categories,
    'main_content' => $main_content,
]);

print($page_content);
