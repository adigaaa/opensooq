<?php


use App\Services\Builder\InputsBuilder;
use App\Services\Hamming;
use App\Services\Levenshtein;
use libraries\Helper;
use libraries\ServiceContainer;

ServiceContainer::set('levenshtein',function (){
    return new Levenshtein;
});

ServiceContainer::set('hamming',function (){
    return new Hamming();
});

ServiceContainer::set('builder',function (){
    return new InputsBuilder;
});

$builder = ServiceContainer::get('builder')->setFirstString('this is a test')->setSecondString('this is test');

assert(Helper::calculateDistance('levenshtein', $builder) == 2);

$builder = ServiceContainer::get('builder')->setFirstString('this is test')->setSecondString('the is test');

assert(Helper::calculateDistance('levenshtein', $builder) == 2);



$builder = ServiceContainer::get('builder')->setFirstString('murad')->setSecondString('muraa');

assert(Helper::calculateDistance('hamming', $builder) == 1);

