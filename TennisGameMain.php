<?php


include ('TennisGame.php');

$tennisGame = new TennisGame();

$tennisGame->getScore( 6, 8);

echo $tennisGame;
