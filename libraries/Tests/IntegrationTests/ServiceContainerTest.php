<?php


use App\Services\Hamming;
use App\Services\Levenshtein;
use libraries\ServiceContainer;

ServiceContainer::set('hamming',function (){
    return new Hamming;
});


ServiceContainer::set('levenshtein',function (){
    return new Levenshtein;
});

assert(ServiceContainer::get('hamming') instanceof Hamming);
assert(ServiceContainer::get('levenshtein') instanceof Levenshtein);



