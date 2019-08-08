# About

You have a deck of 52 cards, comprised of 4 suits (hearts, clubs, spades and diamonds) each with 13 values (Ace, two, three, four, five, six, seven, eight, nine, ten, jack, queen and king).
There are four players waiting to play around a table.
The deck arrives in perfect sequence (so, ace of hearts is at the bottom, two of hearts is next, etc. all the way up to king of diamonds on the top).

Create a simple command line program that when executed recreates the scenario above and then performs the following two actions:
Shuffle the cards - We would like to take the deck that is in sequence and shuffle it so that no two cards are still in sequence.
Deal the cards - We would then like to deal seven cards to each player (one card to the each player, then a second card to each player, and so on)

# Requirements
The project requires PHP version 7.1

# Installation

Install dependencies
```
composer install
```

## Localhost

```
php index.php
```

## Using Docker

```
docker build -t card-game-image .
```

```
docker run  card-game-image
```
