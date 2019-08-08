<?php

namespace CardGame\Decks;

use CardGame\Card;

interface DeckInterface
{
    public function isCompleted(): bool;
}
