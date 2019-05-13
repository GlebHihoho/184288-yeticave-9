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
