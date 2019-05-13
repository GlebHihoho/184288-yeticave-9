<?php

$title = 'Главная';
$content = include_template('index.php', [
    'categories' => get_categories(),
    'auction_lots' => get_all_lots(),
]);
