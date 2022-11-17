<?php

require 'vendor/autoload.php';

use App\Router;
use App\Config;
use App\Session;

Session::init();

$router = Router::setFromFile('routes.php');


preg_match('/^([^:\/]+[s]?):\/\/([^\/]*)\/(.*)$/', Config::APPURL, $matches);
if (!isset($matches[3])) {
    $realURI = trim($_SERVER['REQUEST_URI'], '/');
} else {
    $baseConfigURL = $matches[3];
    $realURI = substr(trim($_SERVER['REQUEST_URI'], '/'), strlen($baseConfigURL) + 1);
}
try {
    $router->direct(
        $realURI,
        isset($_POST['_method']) ? $_POST['_method'] : $_SERVER['REQUEST_METHOD']
    );
} catch (Exception $e) {
    header('HTTP/1.1 404 Not Found', true, 404);
    echo "404 Not Found";
}


function route($uri)
{
    return Config::APPURL . '/' . $uri;
}

function redirect($uri)
{
    header('Location: ' . route($uri));
}
