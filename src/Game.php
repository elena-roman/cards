<?php

namespace CardGame;

use CardGame\Decks\Builder\OrderedStandardDeckBuilder;
use CardGame\Decks\Shuffler\NoSequenceStandardDeckShuffler;
use CardGame\Decks\StandardDeck;

class Game
{
    /**
     * @var int
     */
    private $noCardsDealt;

    /**
     * @var array
     */
    private $players = [];

    /**
     * Game constructor.
     * @param $noCardsDealt
     * @param $playerNames
     */
    public function __construct($noCardsDealt, $playerNames)
    {
        $this->noCardsDealt = $noCardsDealt;

        for ($i = 0; $i < count($playerNames); $i++) {
            $this->players[] = new Player($playerNames[$i], new StandardDeck());
        }
    }

    public function start()
    {
        try {
            // Build a deck
            $deck = (new OrderedStandardDeckBuilder())->build();

            // Shuffle the cards
            $deck = (new NoSequenceStandardDeckShuffler())->shuffle($deck);

            // Deal the cards
            $cards = $deck->getCards();
            for ($i = 0; $i < $this->noCardsDealt; $i++) {
                /** @var Player $player */
                foreach ($this->players as $player) {
                    $card = array_pop($cards);
                    $player->getDeck()->addCard($card);
                }
            }
        } catch (\Exception $ex) {
            dd($ex->getMessage());
        }
    }

    public function print()
    {
        /** @var Player $player */
        foreach ($this->players as $player) {
            echo  sprintf(
                "\n Player %s has received %s \n",
                $player->getName(),
                implode(", ", $player->getDeck()->getCards())
            );
        }
    }
}
