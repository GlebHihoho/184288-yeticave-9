<?php

if (!isset($_GET['id']) || empty($_GET['id']) || !is_numeric($_GET['id'])) {
    list($title, $content) = print_err(
        '404 - страница не существует',
        "Передан некорректный аргумент id",
        404
    );

    return $content;
}

$id = intval($_GET['id']);
$lot = get_lot_by_id($id);

if (!count($lot)) {
    list($title, $content) = print_err(
        'Лот не найден',
        "Лот с id - {$id} не существует!",
        404
    );

    return $content;
}
$bets = get_bets_by_lot_id($id);

$title = $lot['lot_name'];
$content = include_template('lot.php', [
    'categories' => get_categories(),
    'lot' => $lot,
    'bets' => $bets,
    'bet_count' => count($bets),
]);
