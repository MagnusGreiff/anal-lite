<?php

namespace Radchasay\DiceGame;

class Dice
{

    public $rolls = [];


    public function roll($min = 1, $max = 6)
    {
        $roll = rand($min, $max);
        $this->rolls[] = $roll;
        return $roll;
    }


    /*    protected $rolls = [];


        public function roll()
        {
            $roll = rand(1, 6);
            echo "rolling";
            array_push($this->rolls, $roll);
            print_r($this->rolls);
            return $roll;
        }

        public function getTotal()
        {
            return array_sum($this->rolls);
        }

        public function getRollsAsArray()
        {
            return $this->rolls;
        }
        /*    public function roll()
            {
                return rand(1,6);
            }*/
}
