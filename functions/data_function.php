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


function get_lot_by_id($id)
{
    $link = get_link();

    if (!$link) {
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    } else {
        $sql_request =
            'SELECT
                lots.id,
                lots.name as lot_name,
                lots.description,
                lots.time_end,
                lots.start_price,
                lots.step_bet,
                lots.img_url,
                categories.name as category_name
            FROM lots
            JOIN categories ON categories.id = lots.id
            WHERE lots.id = ' . $id;
        $result = mysqli_query($link, $sql_request);

        if ($result) {
            return mysqli_fetch_assoc($result);
        }

        return false;
    }
}

function get_bets_by_lot_id($id)
{
    $link = get_link();

    if (!$link) {
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    } else {
        $sql_request =
            "SELECT
                bets.id,
                bets.time_start,
                bets.cost,
                users.name
            FROM bets
            JOIN users ON users.id = bets.user_id
            WHERE bets.lot_id = {$id}
            ORDER BY bets.time_start DESC;";
        $result = mysqli_query($link, $sql_request);

        if ($result) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }

        return false;
    }
}

function get_bets_count_by_lot_id($id)
{
    $link = get_link();

    if (!$link) {
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    } else {
        $sql_request = "SELECT COUNT(*) as count FROM bets WHERE bets.lot_id = {$id}";
        $result = mysqli_query($link, $sql_request);

        if ($result) {
            return mysqli_fetch_assoc($result)['count'];
        }

        return false;
    }
}

function get_current_bet_by_lot_id($id)
{
    $link = get_link();

    if (!$link) {
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    } else {
        $sql_request = "SELECT MAX(cost) as cost FROM bets WHERE lot_id = {$id}";
        $result = mysqli_query($link, $sql_request);

        if ($result) {
            return mysqli_fetch_assoc($result)['cost'];
        }

        return false;
    }
}
