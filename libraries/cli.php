<?php

use Exceptions\Handler;
use libraries\Helper;
use libraries\ServiceContainer;

require_once __DIR__.'/../bootstrap/app.php';

echo "Distance calculator" .PHP_EOL;
echo 'First Text: '.PHP_EOL;
$input = fopen("php://stdin", "r");
$first_text = fgets($input);
echo 'Second Text: '.PHP_EOL;
$input = fopen("php://stdin", "r");
$second_text  = fgets($input);
echo 'choose levenshtein Or hamming calculator: '.PHP_EOL;
$input = fopen("php://stdin", "r");
$type  = trim(fgets($input));


try {
    $builder = ServiceContainer::get('builder')->setFirstString($first_text)->setSecondString($second_text);
    echo Helper::calculateDistance($type, $builder) . ' operation(s)' .PHP_EOL;
}catch (Exception $e){
    echo (new Handler($e))->respond() .PHP_EOL;
}