<?php

namespace CardGame\Decks\Shuffler;

use CardGame\Card;
use CardGame\Decks\StandardDeck;

class NoSequenceStandardDeckShuffler implements DeckShufflerInterface
{
    public function shuffle($deck)
    {
        $newDeck = new StandardDeck();

        $this->buildDeck($newDeck, $deck);
        return $newDeck;
    }

    /**
     * @param StandardDeck $deck
     * @param StandardDeck $candidates
     * @return bool
     */
    private function buildDeck(StandardDeck &$deck, StandardDeck $candidates): bool
    {
        // Completed
        if ($deck->isCompleted()) {
            return true;
        }

        // Possible candidates
        $cards = $candidates->getCards();
        do {
            // Get one possible card
            $index = rand(0, count($cards) - 1);
            $card = $cards[$index];

            // Remove it from possible
            unset($cards[$index]);
            $cards = array_values($cards);

            if ($this->isValid($deck, $card)) {
                $deck->addCard($card);
                $candidates->removeCard($card);

                if (!$this->buildDeck($deck, $candidates)) {
                    array_pop($deck->getCards());
                    $candidates->addCard($card);
                }
            }

        } while (!empty($cards));

        return false;
    }

    /**
     * @param Card $card
     * @param StandardDeck $deck
     * @return bool
     */
    private function isValid(StandardDeck $deck, $card)
    {
        if ($deck->isEmpty()) {
            return true;
        }

        /** @var Card $a */
        $a = array_pop($deck->getCards());

        return ($a->getNumber() === $card->getNumber() - 1);
    }
}