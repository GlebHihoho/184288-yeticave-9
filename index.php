<?php
require('./auctionHelper.php');
require('./helpers.php');

$main_content = include_template('main.php', [
    'categories' => $categories,
    'auction_lots' => $auction_lots,
]);
$page_content = include_template('layout.php', [
    'title' => 'Главная',
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'categories' => $categories,
    'main_content' => $main_content,
]);

print($page_content);
