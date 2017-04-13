<?php
namespace Radchasay\DiceGame;

class Game
{
    private $player1;
    private $player2;
    private $dice;
    private $rolls;
    private $currentScore;
    private $currentPlayer;
    public $won = false;
    private $players;

    public function __construct()
    {
        $this->dice = new \Radchasay\DiceGame\Dice();
        $this->player1 = [
            "Name" => "Player0",
            "Score" => 0
        ];
        $this->player2 = [
            "Name" => "Player1",
            "Score" => 0
        ];
        $this->players[] = $this->player1;
        $this->players[] = $this->player2;
        $this->rolls = [];
        $this->currentScore = 0;
        $this->currentPlayer = 0;
    }

    public function checkWinner()
    {
    }

    public function switchPlayer()
    {
        $this->currentScore = 0;
        $this->dice->rolls = [];
        if ($this->currentPlayer == 0) {
            $this->currentPlayer = 1;
        } else {
            $this->currentPlayer = 0;
        }
    }

    public function getRolls()
    {
        return implode(", ", $this->dice->rolls);
    }

    public function getCurrentPlayer()
    {
        return $this->currentPlayer;
    }

    public function getPlayerScore($player)
    {
        return $this->players[$player]["Score"];
    }

    public function getCurrentScore()
    {
        return $this->currentScore;
    }

    public function game($state)
    {
        if ($state == "roll") {
            $rollNumber = $this->dice->roll();
            if ($rollNumber == 1) {
                $this->switchPlayer();
            } else {
                $this->currentScore += $rollNumber;
            }
        } elseif ($state == "save") {
            $this->players[$this->currentPlayer]["Score"] += $this->currentScore;
            if ($this->players[$this->currentPlayer]["Score"] >= 100) {
                $winner = "<h1 id='winner'>The winner is " . $this->players[$this->currentPlayer]["Name"] . "</h1>";
                $this->won = true;
                echo $winner;
            }
            $this->switchPlayer();
        }
    }
}
