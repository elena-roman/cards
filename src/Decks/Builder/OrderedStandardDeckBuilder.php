<?php

namespace CardGame\Decks\Builder;

use CardGame\Card;
use CardGame\Decks\StandardDeck;

class OrderedStandardDeckBuilder implements DeckBuilderInterface
{
    function build(): StandardDeck
    {
        $deck = new StandardDeck();

        $suites = Card::getSuites();
        for ($i=0; $i<count($suites); $i++) {
            for ($j=1; $j<14; $j++) {
                $deck->addCard(new Card($j, $suites[$i]));
            }
        }

        return $deck;
    }
}