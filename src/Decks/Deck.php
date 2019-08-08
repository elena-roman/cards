<?php

namespace CardGame\Decks;

use CardGame\Card;

abstract class Deck
{
    private $cards = [];

    /**
     * Deck constructor.
     */
    public function __construct() {
        $this->cards = [];
    }

    /**
     * @return array
     */
    public function getCards(): array
    {
        return $this->cards;
    }

    /**
     * @param array $cards
     */
    public function setCards(array $cards): void
    {
        $this->cards = $cards;
    }

    /**
     * @param Card $card
     */
    public function addCard(Card $card) : void
    {
        $this->cards[] = $card;
    }

    /**
     * @return bool
     */
    public function isEmpty() : bool {
        return empty($this->cards);
    }

    /**
     * Remove a card from the deck
     * @param $card
     */
    public function removeCard($card) : void {
        array_filter($this->cards, function (Card $c) use ($card) {
            return !$c->isEqual($card);
        });
    }

    /**
     * Check if a card is contained in the deck
     * @param Card $card
     * @return bool
     */
    public function containsCard(Card $card): bool
    {
        $cards = array_filter($this->cards, function (Card $c) use ($card) {
            return $c->isEqual($card);
        });

        return count($cards) > 0;
    }

    abstract public function isCompleted(): bool;

    public function __toString()
    {
        return implode(",", $this->cards);
    }


}