<?php

use CardGame\Player;

require "vendor/autoload.php";

$game = (new CardGame\Game(7, ['Jack', 'John', 'Jane', 'Jill']));
$game->start();
$game->print();
