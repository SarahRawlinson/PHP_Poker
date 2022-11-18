<?php

use App\Classes\Cards\Card\ICard;
use App\Classes\Cards\Dealer\IDealer;
use App\Classes\Cards\Dealer\StandardPlayingCardDealer;
use App\Classes\Cards\Deck;

test("dealer instance of IDealer", function ()
{
    $dealer = new StandardPlayingCardDealer();
    expect($dealer)->toBeInstanceOf(IDealer::class);
});

test("dealer gives Deck", function ()
{
    $dealer = new StandardPlayingCardDealer();
    expect($dealer->popCards(1))->toBeInstanceOf(Deck::class);
});
test("dealer gives Deck 2", function ()
{
    $dealer = new StandardPlayingCardDealer();
    expect($dealer->popCards(2))->toBeInstanceOf(Deck::class);
});

test("dealer gives ICard in Deck", function ()
{
    $dealer = new StandardPlayingCardDealer();
    expect($dealer->popCards(1)[0])->toBeInstanceOf(ICard::class);
});

test('shuffle works', function ()
{
    $dealer = new StandardPlayingCardDealer();
    $deck1 = new Deck($dealer->getDeck());
    $dealer->shuffleCards();
    $deck2 = new Deck($dealer->getDeck());
    expect($deck1)->not()->toEqual($deck2);
});

