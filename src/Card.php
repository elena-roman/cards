<?php

namespace CardGame;

class Card
{
    const SUIT_CLUBS = 'clubs';
    const SUIT_SPADES = 'spades';
    const SUIT_HEARTS = 'hearts';
    const SUIT_DIAMONDS = 'diamonds';

    private $number;
    private $suit;

    /**
     * Card constructor.
     * @param $number
     * @param $suit
     */
    public function __construct($number, $suit)
    {
        $this->number = $number;
        $this->suit = $suit;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        switch ($this->number) {
            case 1:
                return 'ace';
            case 11:
                return 'jack';
            case 12:
                return 'queen';
            case 13:
                return 'king';
            default:
                return $this->number;
        }
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getSuit()
    {
        return $this->suit;
    }

    /**
     * @return string
     */
    public function getSuitIcon(): string
    {
        switch ($this->suit) {
            case self::SUIT_SPADES:
                return '♠';
            case self::SUIT_DIAMONDS:
                return '♦';
            case self::SUIT_CLUBS:
                return '♣';
            case self::SUIT_HEARTS:
                return '♥';
        }
    }

    /**
     * @param mixed $suit
     */
    public function setSuit($suit): void
    {
        $this->suit = $suit;
    }

    /**
     * @param Card $card
     * @return bool
     */
    public function isEqual(Card $card): bool
    {
        return $card->suit === $this->suit && $this->number === $card->suit;
    }

    public static function getSuites(): array
    {
        return [
            self::SUIT_CLUBS,
            self::SUIT_SPADES,
            self::SUIT_HEARTS,
            self::SUIT_DIAMONDS,
        ];
    }

    public function __toString()
    {
        return $this->getName() . $this->getSuitIcon();
    }


}