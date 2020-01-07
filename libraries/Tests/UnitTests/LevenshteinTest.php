<?php

use App\Services\Contracts\CalculateInterface;
use App\Services\Levenshtein;

assert(new Levenshtein() instanceof CalculateInterface);


$leveneshtince =  new Levenshtein();

$leveneshtince->setFirstString('this is a test');
$leveneshtince->setSecondString('this is test');

assert($leveneshtince->calculate() == 2);


$leveneshtince->setFirstString('this is test');
$leveneshtince->setSecondString('the is test');

assert($leveneshtince->calculate() == 2);



$leveneshtince->setFirstString('kitten');
$leveneshtince->setSecondString('setting');

assert($leveneshtince->calculate() != 6);