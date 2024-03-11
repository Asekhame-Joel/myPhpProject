<?php

namespace core;
use core\Database;

class App
{
    protected static $container;

    public static function setContainer($container)
    {
        static::$container = $container;
    }

    public static function container()
    {
        return static::$container;
    }

    public static function bind($key, $resolver)
    {
        static::container()->bind($key, $resolver);
    }

    public static function resolve($key)
    {
        if (!isset(static::$container)) {
            throw new \Exception("Container not set. Make sure to set the container using setContainer() method before resolving dependencies.");
        }

        return static::container()->resolve($key);
    }

    // Method to set up container and bindings
    public static function setupContainer()
    {
        // Instantiate the container
        $container = new Container();

        // Example binding: Bind core\Database class
        $container->bind('core\\Database', function(){
            $config = require base_path('config.php');
        
            return new Database($config['database']);
        });

        // Set the container in the App class
        static::setContainer($container);
    }
}

// Call the setupContainer method to set up the container and bindings
App::setupContainer();
