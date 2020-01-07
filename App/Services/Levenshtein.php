<?php


namespace App\Services;


use App\Services\Builder\InputsBuilder;
use App\Services\Contracts\CalculateInterface;

class Levenshtein implements CalculateInterface
{
    protected $firstString;

    protected $secondString;

//calculate the number of operations using dynamic programming
//choose optimal operation for each step while creating possibilities array
    public function calculate()
    {
        $dynamicCosts = [];

        for ($i = 1; $i <= strlen($this->secondString); $i++) {
            for ($j = 1; $j <= strlen($this->firstString); $j++) {
                    if($i == 0){
                        $dynamicCosts[0][$i] = $i;
                    }elseif($j == 0){
                        $dynamicCosts[$i][0] = $i;
                    }else{
                        //if the 2 characters are the same substitution is not needed so it's cost is 0
                        $substitution_cost = $this->firstString[$j - 1] == $this->secondString[$i - 1] ? 0 : 1;
                        //check the minimum between the 3 available operations "substitution, insertion, deletion" and choose it as the optimal cost for this cell
                        $cost = min($dynamicCosts[$i - 1][$j - 1]+ $substitution_cost, min($dynamicCosts[$i - 1][$j]+1, $dynamicCosts[$i][$j - 1]+1)) ;
                        $dynamicCosts[$i][$j] = $cost;
                    }

                }
		}
        return $dynamicCosts[strlen($this->secondString)][strlen($this->firstString)];
    }

    public function setFirstString(string $string)
    {
        $this->firstString = $string;
        return $this;
    }

    public function setSecondString(string $string)
    {
        $this->secondString = $string;
        return $this;
    }
    public function fillInputs(InputsBuilder $inputs)
    {
        $this->setFirstString($inputs->getFirstString());
        $this->setSecondString($inputs->getSecondString());
        return $this;
    }
}