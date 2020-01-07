<?php


namespace App\Services;


use App\Services\Builder\InputsBuilder;
use App\Services\Contracts\CalculateInterface;
use Exceptions\NotSameLengthException;

class Hamming implements CalculateInterface
{
    protected $firstString;

    protected $secondString;


    //calculate number of operations based on substitute operation
    public function calculate()
    {
        //if 2 strings are not equal in length hamming is not possible
        if (!$this->areEqual()){
            throw new NotSameLengthException('Not equal lengths');
        }
        $dist = 0;
        $length = strlen($this->firstString);
        for ($i = 0 ; $i <  $length; $i++){
            if($this->firstString[$i] != $this->secondString[$i]) $dist++;
        }
        return $dist;
    }

    protected function areEqual()
    {
        return strlen($this->firstString) == strlen($this->secondString);
    }

    public function setFirstString(string $string)
    {
        $this->firstString = $string;
    }

    public function setSecondString(string $string)
    {
        $this->secondString = $string;
    }
    public function fillInputs(InputsBuilder $inputs)
    {
        $this->setFirstString($inputs->getFirstString());
        $this->setSecondString($inputs->getSecondString());
        return $this;
    }
}