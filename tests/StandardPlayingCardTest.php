<?php

include_once ("Include.php");
$objects = [
    [Rank::Ace, Suit::Diamonds],
    [Rank::Two, Suit::Diamonds],
    [Rank::Three, Suit::Diamonds],
    [Rank::Four, Suit::Diamonds],
    [Rank::Five, Suit::Diamonds],
    [Rank::Six, Suit::Diamonds],
    [Rank::Seven, Suit::Diamonds],
    [Rank::Eight, Suit::Diamonds],
    [Rank::Nine, Suit::Diamonds],
    [Rank::Ten, Suit::Diamonds],
    [Rank::Jack, Suit::Diamonds],
    [Rank::Queen, Suit::Diamonds],
    [Rank::King, Suit::Diamonds],
    [Rank::Ace, Suit::Hearts],
    [Rank::Two, Suit::Hearts],
    [Rank::Three, Suit::Hearts],
    [Rank::Four, Suit::Hearts],
    [Rank::Five, Suit::Hearts],
    [Rank::Six, Suit::Hearts],
    [Rank::Seven, Suit::Hearts],
    [Rank::Eight, Suit::Hearts],
    [Rank::Nine, Suit::Hearts],
    [Rank::Ten, Suit::Hearts],
    [Rank::Jack, Suit::Hearts],
    [Rank::Queen, Suit::Hearts],
    [Rank::King, Suit::Hearts],
    [Rank::Ace, Suit::Spades],
    [Rank::Two, Suit::Spades],
    [Rank::Three, Suit::Spades],
    [Rank::Four, Suit::Spades],
    [Rank::Five, Suit::Spades],
    [Rank::Six, Suit::Spades],
    [Rank::Seven, Suit::Spades],
    [Rank::Eight, Suit::Spades],
    [Rank::Nine, Suit::Spades],
    [Rank::Ten, Suit::Spades],
    [Rank::Jack, Suit::Spades],
    [Rank::Queen, Suit::Spades],
    [Rank::King, Suit::Spades],
    [Rank::Ace, Suit::Clubs],
    [Rank::Two, Suit::Clubs],
    [Rank::Three, Suit::Clubs],
    [Rank::Four, Suit::Clubs],
    [Rank::Five, Suit::Clubs],
    [Rank::Six, Suit::Clubs],
    [Rank::Seven, Suit::Clubs],
    [Rank::Eight, Suit::Clubs],
    [Rank::Nine, Suit::Clubs],
    [Rank::Ten, Suit::Clubs],
    [Rank::Jack, Suit::Clubs],
    [Rank::Queen, Suit::Clubs],
    [Rank::King, Suit::Clubs]
    
    ];


test("check name is string", function (StandardPlayingCard $card)
{
    expect($card->getName())->toBeString();
})->with(function()
{
    $deck = [];
    foreach (Suit::cases() as $suit)
    {
        foreach (Rank::cases() as $rank)
        {
            $deck[] = new StandardPlayingCard($rank, $suit);
        }
    }
    return $deck;
});

test("check image for file exists", function (StandardPlayingCard $card)
{
    $name = "assets/card_images/card_face/".$card->getImage();
    if (!file_exists($name)) {echo $name."\n";}
    expect(file_exists($name))->toBeTrue();
})->with(function()
{
    $deck = [];
    foreach (Suit::cases() as $suit)
    {
        foreach (Rank::cases() as $rank)
        {
            $deck[] = new StandardPlayingCard($rank, $suit);
        }
    }
    return $deck;
});

test("check card in predicted cards", function (StandardPlayingCard $card)
{
    GLOBAL $objects;
    expect($objects)->toContain([$card->getRank(), $card->getSuit()]);
})->with(function()
{
    $deck = [];
    foreach (Suit::cases() as $suit)
    {
        foreach (Rank::cases() as $rank)
        {
            $deck[] = new StandardPlayingCard($rank, $suit);
        }
    }
    return $deck;
});
