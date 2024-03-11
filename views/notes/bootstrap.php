<?php 
use core\App;
use core\Database;
use core\Container;


$container = new Container();

$container->bind('core\\Database', function(){
    $config = require base_path('config.php');

    return new Database($config['database']);
});  

App::setContainer($container);
App::resolve('core\Database');


