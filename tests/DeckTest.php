<?php

use CardGame\Card;
use CardGame\Decks\Deck;
use PHPUnit\Framework\TestCase;

final class DeckTest extends TestCase
{
    /** @var Deck */
    protected $deck;

    protected function setUp(): void
    {
        $this->deck = new Deck();
    }

    protected function tearDown(): void
    {
        $this->deck = null;
    }

    public function testIsEmpty()
    {
        $this->assertTrue($this->deck->isEmpty());

        $cardA = new Card(1, Card::SUIT_SPADES);
        $this->deck->setCards([$cardA]);
        $this->assertFalse($this->deck->isEmpty());

        $cardB = new Card(1, Card::SUIT_DIAMONDS);
        $this->deck->setCards([$cardA, $cardB]);
        $this->assertFalse($this->deck->isEmpty());
    }

    public function testRemoveCard()
    {
        $this->expectException(Exception::class);
        $cardA = new Card(1, Card::SUIT_SPADES);
        $this->deck->removeCard($cardA);
    }

    public function testContainsCard()
    {
        $cardA = new Card(1, Card::SUIT_SPADES);
        $this->assertFalse($this->deck->containsCard($cardA));

        $this->deck->setCards([$cardA]);
        $this->assertTrue($this->deck->containsCard($cardA));

        $cardB = new Card(1, Card::SUIT_DIAMONDS);
        $this->assertFalse($this->deck->containsCard($cardB));
    }
}
