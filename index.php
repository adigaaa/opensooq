<?php

use App\Services\Builder\InputsBuilder;
use App\Services\Hamming;
use App\Services\Levenshtein;
use Exceptions\Handler;
use libraries\Helper;
use libraries\ServiceContainer;

require_once __DIR__.'/bootstrap/app.php';


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    try {
        $builder = ServiceContainer::get('builder')->setFirstString($_POST['first_text'])->setSecondString($_POST['second_text']);
        echo Helper::calculateDistance($_POST['type'], $builder) . " operation(s)";
    }catch (Exception $e){
        echo (new Handler($e))->respond();
    }
}


include 'views/leven.php';

?>