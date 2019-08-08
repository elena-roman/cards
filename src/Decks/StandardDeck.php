<?php

namespace CardGame\Decks;

class StandardDeck extends Deck implements DeckInterface
{
    const DECK_SIZE = 52;

    /**
     * Deck constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function isCompleted(): bool
    {
        return count($this->getCards()) == self::DECK_SIZE;
    }
}
