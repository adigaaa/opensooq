<?php


namespace App\Services\Builder;


class InputsBuilder
{
    protected $firstString;

    protected $secondString;

   public function setFirstString(string $firstString)
   {
        $this->firstString = $firstString;
        return $this;
   }

   public function setSecondString(string $secondString)
   {
       $this->secondString = $secondString;
       return $this;
   }

   public function getFirstString()
   {
        return $this->firstString;
   }

   public function getSecondString()
   {
        return $this->secondString;
   }
}