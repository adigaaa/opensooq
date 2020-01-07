<?php

use App\Services\Builder\InputsBuilder;
use App\Services\Hamming;
use App\Services\Levenshtein;
use libraries\ServiceContainer;

require_once __DIR__.'/../libraries/autoload.php';



ServiceContainer::set('levenshtein',function (){
    return new Levenshtein;
});

ServiceContainer::set('hamming',function (){
    return new Hamming();
});

ServiceContainer::set('builder',function (){
    return new InputsBuilder;
});
