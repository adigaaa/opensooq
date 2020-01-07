<?php

use App\Services\Contracts\CalculateInterface;
use App\Services\Hamming;

$hamming = new Hamming;
assert($hamming  instanceof CalculateInterface);

$hamming->setFirstString('murad');
$hamming->setSecondString('muraa');
assert($hamming->calculate() == 1);

$hamming->setFirstString('murad');
$hamming->setSecondString('murad');

assert($hamming->calculate() != 1);
