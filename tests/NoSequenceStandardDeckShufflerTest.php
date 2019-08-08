<?php

use CardGame\Card;
use CardGame\Decks\Builder\OrderedStandardDeckBuilder;
use CardGame\Decks\Shuffler\NoSequenceStandardDeckShuffler;
use CardGame\Decks\StandardDeck;
use PHPUnit\Framework\TestCase;

final class NoSequenceStandardDeckShufflerTest extends TestCase
{
    public function testShuffle()
    {
        $deck = (new OrderedStandardDeckBuilder())->build();
        $deck = (new NoSequenceStandardDeckShuffler())->shuffle($deck);

        $this->assertCount(StandardDeck::DECK_SIZE, $deck->getCards());

        for ($i=1; $i<count($deck->getCards()); $i++) {
            /** @var Card $cardA */
            $cardA = $deck->getCards()[$i-1];
            /** @var Card $cardB */
            $cardB = $deck->getCards()[$i];

            $isTrue = ($cardA->getNumber() !== ($cardB->getNumber() - 1)) ||
                ($cardA->getNumber() !== ($cardB->getNumber() + 1));

            $this->assertTrue($isTrue);
        }
    }
}
