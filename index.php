<?php
require('./auctionHelper.php');
require('./helpers.php');

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
