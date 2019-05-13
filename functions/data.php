<?php
class DbConnection
{
    private static $connection;

    static function getConnection()
    {
        if (self::$connection === null) {
            self::$connection = mysqli_connect('localhost', 'root', '12321Glrbct', 'yeticave');
            if (!self::$connection) {
                die("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
            }
            mysqli_set_charset(DbConnection::$connection, "utf8");
        }
        return self::$connection;
    }
}

function get_categories() : array
{
    $link = DbConnection::getConnection();
    $sql_request = 'SELECT * FROM categories';
    $get_categories = mysqli_query($link, $sql_request);
    $categories = mysqli_fetch_all($get_categories, MYSQLI_ASSOC);

    return $categories;
}

function get_all_lots() : array
{
    $link = DbConnection::getConnection();
    $sql_request =
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
    $get_lots = mysqli_query($link, $sql_request);
    $lots = mysqli_fetch_all($get_lots, MYSQLI_ASSOC);

    return $lots;
}


function get_lot_by_id($id): array
{
    $link = DbConnection::getConnection();
    $sql_request =
        "SELECT
            lots.id,
            lots.name as lot_name,
            lots.description,
            lots.time_end,
            lots.start_price,
            lots.step_bet,
            lots.img_url,
            bets.cost as lot_cost,
            categories.name as category_name
        FROM lots
        JOIN categories ON categories.id = lots.id
        LEFT JOIN bets ON bets.lot_id = lots.id
        WHERE lots.id=?
        ORDER BY bets.cost DESC LIMIT 0, 1";
    $result = db_fetch_data($link, $sql_request, [$id]);
    if (!isset($result[0])) {
        return [];
    }
    $lot = $result[0];
    $lot['lot_price'] = $lot['lot_price'] ?? $lot['start_price'];
    $lot['min_bet'] = $lot['lot_price'] + $lot['step_bet'];
    return $lot;
}

function get_bets_by_lot_id($id): array
{
    $link = DbConnection::getConnection();
    $sql_request =
        "SELECT
            bets.id,
            bets.time_start,
            bets.cost,
            users.name
        FROM bets
        JOIN users ON users.id = bets.user_id
        WHERE bets.lot_id = ?
        ORDER BY bets.time_start DESC;";

    $result = db_fetch_data($link, $sql_request, [$id]);

    return $result;
}
