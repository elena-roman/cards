<?php

use CardGame\Card;
use PHPUnit\Framework\TestCase;

final class CardTest extends TestCase
{
    public function testGetName()
    {
        $this->assertEquals(
            'ace',
            (new Card(1, Card::SUIT_SPADES))->getName()
        );

        $this->assertEquals(
            'jack',
            (new Card(11, Card::SUIT_CLUBS))->getName()
        );

        $this->assertEquals(
            'queen',
            (new Card(12, Card::SUIT_HEARTS))->getName()
        );

        $this->assertEquals(
            'king',
            (new Card(13, Card::SUIT_DIAMONDS))->getName()
        );

        $this->assertEquals(
            3,
            (new Card(3, Card::SUIT_SPADES))->getName()
        );
    }

    public function testGetSuitIcon()
    {
        $this->assertEquals(
            '♠',
            (new Card(1, Card::SUIT_SPADES))->getSuitIcon()
        );

        $this->assertEquals(
            '♦',
            (new Card(11, Card::SUIT_DIAMONDS))->getSuitIcon()
        );

        $this->assertEquals(
            '♣',
            (new Card(12, Card::SUIT_CLUBS))->getSuitIcon()
        );

        $this->assertEquals(
            '♥',
            (new Card(13, Card::SUIT_HEARTS))->getSuitIcon()
        );
    }

    public function testIsEqual()
    {
        $cardA = new Card(1, Card::SUIT_SPADES);
        $cardB = new Card(1, Card::SUIT_DIAMONDS);
        $this->assertFalse($cardA->isEqual($cardB));

        $cardA = new Card(2, Card::SUIT_SPADES);
        $cardB = new Card(1, Card::SUIT_SPADES);
        $this->assertFalse($cardA->isEqual($cardB));

        $cardA = new Card(3, Card::SUIT_DIAMONDS);
        $cardB = new Card(3, Card::SUIT_DIAMONDS);
        $this->assertTrue($cardA->isEqual($cardB));
    }
}
