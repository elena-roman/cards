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
     * @throws \Exception
     */
    private function buildDeck(StandardDeck &$deck, StandardDeck $candidates): bool
    {
        if ($deck->isCompleted()) {
            return true;
        }

        $cards = $candidates->getCards();
        shuffle($cards);

        foreach ($cards as $card) {
            if ($this->isValid($deck, $card)) {
                $deck->addCard($card);

                $candidates->removeCard($card);
                if ($this->buildDeck($deck, $candidates)) {
                    return true;
                }

                $candidates->addCard($card);
                $deck->removeCard($card);
            }
        }
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

        /** @var Card $lastCard */
        $lastCard = $deck->getCards()[count($deck->getCards()) - 1];

        /**
         * So... didn't really understood what was meant by sequence
         * I'm just checking if there is a sequence no matter the card suit
         * To add check by card suit it's just one extra line here
         */
        return ($lastCard->getNumber() !== ($card->getNumber() - 1)) ||
            ($lastCard->getNumber() !== ($card->getNumber() + 1));
    }
}
