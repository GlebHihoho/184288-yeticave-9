<?php

function get_current_bet($current_bet, $start_cost)
{
    return $current_bet ? $current_bet : $start_cost;
}

function get_min_bet($current_bet, $step_bet)
{
    return $current_bet + $step_bet . " ₽";
}

function format_bet_cost(string $cost) : string
{
    return htmlspecialchars($cost) . " ₽";
}

function format_bet_time(string $time)
{
    $seconds_in_hour = 3600;
    $seconds_in_two_hours = 7200;
    $seconds_in_five_hours = 18000;
    $seconds_in_ten_hours = 36000;
    $minutes_in_hour = 60;

    $format_time = '';
    $diff_time = strtotime($time) - time();
    $diff_time = abs($diff_time);

    if ($diff_time < $seconds_in_hour) {
        $format_time = floor($diff_time % $seconds_in_hour / $minutes_in_hour) . ' минут назад';
    } elseif ($diff_time >= $seconds_in_hour && $diff_time < $seconds_in_two_hours) {
        $format_time = floor($diff_time / $seconds_in_hour) . ' час назад';
    } elseif ($diff_time >= $seconds_in_two_hours && $diff_time < $seconds_in_five_hours) {
        $format_time = floor($diff_time / $seconds_in_hour) . ' часа назад';
    } elseif ($diff_time >= $seconds_in_five_hours && $diff_time < $seconds_in_ten_hours) {
        $format_time = floor($diff_time / $seconds_in_hour) . ' часов назад';
    } else {
        $format_time = date('y.m.d', strtotime($time)) . ' в ' . date('H:i', strtotime($time));
    }

    return $format_time;
}
