<?php
use core\Session;
use core\ValidationException;

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . '/vendor/autoload.php';

require BASE_PATH . 'core/functions.php';

// spl_autoload_register(function ($class) {
//     // Core\Database
//     $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
//     require base_path("{$class}.php");


// });


$router = new \core\Router();
$routes = require base_path("routes.php");

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try{
$router->route($uri, $method);
}
catch(ValidationException $exception){
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());

}
Session::unflash();
