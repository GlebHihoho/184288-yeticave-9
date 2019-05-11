<?php

$is_auth = rand(0, 1);
$user_name = 'Gleb';

require('./boot.php');

$url = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$params = parse_url($url);
$path = $params['path'];

function get_page_content(string $path) : array
{
    switch ($path) {
        case '/lot':
            if (isset($_GET['id']) && $_GET['id'] && get_lot_by_id($_GET['id'])) {
                $id = intval($_GET['id']);
                $lot = get_lot_by_id($id);
                $current_bet = get_current_bet(get_current_bet_by_lot_id($id), $lot['start_price']);
                $min_bet = get_min_bet($current_bet, $lot['step_bet']);

                if ($lot) {
                    return
                        [
                            $lot['lot_name'],
                            include_template('lot.php', [
                                'categories' => get_categories(),
                                'lot' => $lot,
                                'bets' => get_bets_by_lot_id($id),
                                'bet_count' => get_bets_count_by_lot_id($id),
                                'current_bet' => $current_bet,
                                'min_bet' => $min_bet,
                            ]),
                        ];
                }
            } else {
                return
                    [
                        'Лот не найден',
                        include_template('404.php', [
                            'categories' => get_categories(),
                        ]),
                    ];
            }
            break;
        default:
            return
                [
                    'Главная',
                    include_template('main.php', [
                        'categories' => get_categories(),
                        'auction_lots' => get_all_lots(),
                    ]),
                ];
    }
}

list($title, $content) = get_page_content($path);

$page_content = include_template('layout.php', [
    'title' => $title,
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'categories' => get_categories(),
    'main_content' => $content,
]);

print($page_content);
