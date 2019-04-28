<?php

function format_cost(float $cost) : string
{
    $round_cost = ceil($cost);
    return number_format($round_cost, 0, '', ' ') . " ₽";
}

function get_time_in_hours_minutes(string $time) : array
{
    $diff_time = strtotime($time) - time();

    if ($diff_time <= 0) {
        return [0, 0];
    }
        return [floor($diff_time / 3600), floor($diff_time % 3600 / 60)];
}

function get_time_to_lot(string $lot_time) : string
{
    list($hours, $minutes) = get_time_in_hours_minutes($lot_time);
    return sprintf("%02d:%02d", $hours, $minutes);
}

function is_last_hour(string $lot_time) : bool
{
    list($hours, $minutes) = get_time_in_hours_minutes($lot_time);
    return $hours < 1;
}
