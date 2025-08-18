<?php

require __DIR__.'/../framework/Database.php';
require __DIR__.'/../framework/Validator.php';

$db = new Database();


$routes = require __DIR__.'/../routes/web.php';

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // <-- Normaliza la URI
$route = $routes[$requestUri] ?? null;



if ($route) {
    require __DIR__.'/../'.$route;
} else {
    die("404 Not Found");
}
