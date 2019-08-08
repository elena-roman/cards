<?php

namespace CardGame;

use CardGame\Decks\Deck;

class Player
{
    private $name;
    private $deck;

    /**
     * Player constructor.
     * @param $name
     * @param $deck
     */
    public function __construct($name, $deck)
    {
        $this->name = $name;
        $this->deck = $deck;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return Deck
     */
    public function getDeck()
    {
        return $this->deck;
    }

    /**
     * @param Deck $deck
     */
    public function setDeck($deck): void
    {
        $this->deck = $deck;
    }
}
