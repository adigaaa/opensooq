<?php


require_once __DIR__.'/../autoload.php';


foreach (glob(__DIR__."/*/*.php") as $filename)
{
    include $filename;
}





