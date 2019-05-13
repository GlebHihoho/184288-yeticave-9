<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


$is_auth = rand(0, 1);
$user_name = 'Gleb';

date_default_timezone_set("Europe/Moscow");

define('ROOT_DIR', __DIR__);
define('ROUTER_DIR', ROOT_DIR . DIRECTORY_SEPARATOR . "routers" . DIRECTORY_SEPARATOR);
define('STATIC_DIR', DIRECTORY_SEPARATOR . "static" . DIRECTORY_SEPARATOR);

require('./functions/helpers.php');
require('./functions/data.php');
require('./functions/lot.php');

$url = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
$params = parse_url($url);
$path = explode('/', $params['path']);

$route = !isset($path[1]) || empty($path[1]) ? 'index' : $path[1];

$routers = [
    'index',
    'lot',
];

$file = ROUTER_DIR. $route . '.php';
if (in_array($route, $routers) && file_exists($file)) {
    require_once($file);
}

$page_content = include_template('layout.php', [
    'title' => $title ?? 'YetiCave',
    'user_name' => $user_name,
    'is_auth' => $is_auth,
    'categories' => get_categories(),
    'main_content' => $content,
]);

print($page_content);
