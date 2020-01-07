<?php


namespace libraries;


use App\Services\Builder\InputsBuilder;
use App\Services\Contracts\CalculateInterface;
use App\Services\Hamming;
use App\Services\Levenshtein;
use InvalidArgumentException;
use Exception;

//helper class for instantiation, and common functionalities for the distances
class Helper
{
    public static function calculateDistance(string $instanceType, InputsBuilder $inputs):int
    {
        $instance = ServiceContainer::get($instanceType);
        //check if the type given is actually an instance of the calculate interface
        if($instance instanceof CalculateInterface){
            return $instance->fillInputs($inputs)->calculate();
        }
        throw new Exception('');
    }

}