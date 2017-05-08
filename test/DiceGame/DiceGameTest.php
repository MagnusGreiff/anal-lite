<?php

namespace Radchasay\DiceGame;

class DiceGameTest extends \PHPUnit_Framework_TestCase
{

    public function testObject()
    {
        #Test to see if game is correct instance.
        $game = new Game();
        $this->assertInstanceOf("\Radchasay\DiceGame\Game", $game);
    }

    public function testRoll()
    {
        #Test to roll the dice;
        $dice = new Dice();
        $dice->roll();
    }

    public function testGetRolls()
    {
        #Test that getRolls works.
        $game = new Game();
        $game->getRolls();
    }

    public function testPlayerThings()
    {
        #Test that correct type is returned when calling methods.
        $game = new Game();
        $this->assertInternalType("int", $game->getCurrentPlayer());
        $this->assertInternalType("int", $game->getCurrentScore());
        $this->assertInternalType("int", $game->getPlayerScore($game->getCurrentScore()));
    }

    public function testGame()
    {
        #Test roll and save;
        $game = new Game();
        $game->game("roll");
        $game->game("save");

        #Test what happens when you roll 1 and testing switching players;
        $game = new Game();
        $game->game("roll", null, 1);
        $game->game("save");

        #Test what happens when player wins.
        $game = new Game();
        $game->game("roll", 100, 100);
        $game->game("save");
    }
}
