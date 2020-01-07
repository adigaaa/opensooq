<?php


namespace App\Services\Contracts;


use App\Services\Builder\InputsBuilder;

interface CalculateInterface
{
    public function setFirstString(string $string);
    public function setSecondString(string $string);
    public function fillInputs(InputsBuilder $inputs);
    public function calculate();
}