<?php
spl_autoload_register(function ($class) {
    $file =  str_replace('\\', '/', $class) . '.php';
    if (!file_exists($file)) {
        throw new Exception("class $class not found!");
    }
    require $file;
});
