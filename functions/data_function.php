<?php

function get_link()
{
    $link = mysqli_connect('localhost', 'root', '12321Glrbct', 'yeticave');
    mysqli_set_charset($link, "utf8");

    return $link;
}

function get_categories() : array
{
    $link = get_link();

    if (!$link) {
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    } else {
        $sql_request = 'SELECT * FROM categories';
        $get_categories = mysqli_query($link, $sql_request);
        $categories = mysqli_fetch_all($get_categories, MYSQLI_ASSOC);

        return $categories;
    }
}

function get_all_lots() : array
{
    $link = get_link();

    if (!$link) {
        print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
    } else {
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
}
