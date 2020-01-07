<?php


namespace libraries;

use Exception;

//container to manage the instantiation process for the objects
class ServiceContainer
{
    private function __construct(){}
    private function __clone(){}

    protected static $elements = [];

    public static function set(string $name, callable $closure)
    {
        static::$elements[$name] = $closure;
    }

    public static function get(string $name)
    {
        if (!static::has($name)){
            throw  new Exception("Class $name Not Found");
        }
        //calling the closure
        return static::$elements[$name]();
    }

    public static function has($name)
    {
        return array_key_exists($name,static::$elements);
    }
}