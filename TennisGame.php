<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:20 PM
 */

class TennisGame
{
    const LOVE_ALL = "Love-All";
    const FIFTEEN_ALL = "Fifteen-All";
    const THIRTY_ALL = "Thirty-All";
    const FORTY_ALL = "Forty-All";
    const DEUCE = "Deuce";

    const LOVE = "Love";
    const FIFTEEN = "Fifteen";
    const THIRTY = "Thirty";
    const FORTY = "Forty";
    const maxScore = 4;
    public $score = '';

    public function getScore($playerOneScore, $playerTwoScore)
    {

        if ($playerOneScore == $playerTwoScore) {
            $this->alertScore($playerOneScore);
        } else if ($playerOneScore >= self::maxScore || $playerTwoScore >= self::maxScore) {
            $this->hasAdvantage($playerOneScore, $playerTwoScore);
        } else {
            $this->writeScore($playerOneScore, $playerTwoScore);
        }
    }

    public function __toString()
    {
        return $this->score;
    }


    public function hasAdvantage($playerOneScore, $playerTwoScore)
    {
        $minusResult = $playerOneScore - $playerTwoScore;
        if ($minusResult == 1) $this->score = "Advantage player1";
        else if ($minusResult == -1) $this->score = "Advantage player2";
        else if ($minusResult >= 2) $this->score = "Win for player1";
        else $this->score = "Win for player1";
    }

    public function writeScore($playerOneScore, $playerTwoScore)
    {
        for ($i = 1; $i < 3; $i++) {
            if ($i == 1) $tempScore = $playerOneScore;
            else {
                $this->score .= "-";
                $tempScore = $playerTwoScore;
            }
            switch ($tempScore) {
                case 0:
                    $this->score .= self::LOVE;
                    break;
                case 1:
                    $this->score .= self::FIFTEEN;
                    break;
                case 2:
                    $this->score .= self::THIRTY;
                    break;
                case 3:
                    $this->score .= self::FORTY;
                    break;
            }
        }
    }

    public function alertScore($playerOneScore)
    {
        switch ($playerOneScore) {
            case 0:
                $this->score = self::LOVE_ALL;
                break;
            case 1:
                $this->score = self::FIFTEEN_ALL;
                break;
            case 2:
                $this->score = self::THIRTY_ALL;
                break;
            case 3:
                $this->score = self::FORTY_ALL;
                break;
            default:
                $this->score = self::DEUCE;
                break;

        }
    }
}