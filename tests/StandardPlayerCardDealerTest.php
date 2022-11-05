<?php
include_once ("Include.php");

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

test("dealer gives ICard in Deck", function ()
{
    $dealer = new StandardPlayingCardDealer();
    expect($dealer->popCards(1)[0])->toBeInstanceOf(ICard::class);
});

