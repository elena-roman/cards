<?php

use CardGame\Card;
use CardGame\Decks\Builder\OrderedStandardDeckBuilder;
use CardGame\Decks\StandardDeck;
use PHPUnit\Framework\TestCase;

final class OrderedStandardDeckBuilderTest extends TestCase
{
    public function testBuild()
    {
        $deck = (new OrderedStandardDeckBuilder())->build();

        $this->assertCount(StandardDeck::DECK_SIZE, $deck->getCards());

        for ($i=1; $i<count($deck->getCards()); $i++) {
            /** @var Card $cardA */
            $cardA = $deck->getCards()[$i-1];
            /** @var Card $cardB */
            $cardB = $deck->getCards()[$i];

            if ($cardA->getSuit() === $cardB->getSuit()) {
                $this->assertTrue($cardA->getNumber() < $cardB->getNumber());
            }
        }
    }
}
