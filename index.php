<?php

$is_auth = rand(0, 1);
$user_name = 'Gleb';

require('./boot.php');

$categories = get_categories();
$lots = get_all_lots();

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
