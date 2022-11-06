<?php

include_once("Include.php");
$expectedCards = [
    [RankEnum::Ace, SuitEnum::Diamonds],
    [RankEnum::Two, SuitEnum::Diamonds],
    [RankEnum::Three, SuitEnum::Diamonds],
    [RankEnum::Four, SuitEnum::Diamonds],
    [RankEnum::Five, SuitEnum::Diamonds],
    [RankEnum::Six, SuitEnum::Diamonds],
    [RankEnum::Seven, SuitEnum::Diamonds],
    [RankEnum::Eight, SuitEnum::Diamonds],
    [RankEnum::Nine, SuitEnum::Diamonds],
    [RankEnum::Ten, SuitEnum::Diamonds],
    [RankEnum::Jack, SuitEnum::Diamonds],
    [RankEnum::Queen, SuitEnum::Diamonds],
    [RankEnum::King, SuitEnum::Diamonds],
    [RankEnum::Ace, SuitEnum::Hearts],
    [RankEnum::Two, SuitEnum::Hearts],
    [RankEnum::Three, SuitEnum::Hearts],
    [RankEnum::Four, SuitEnum::Hearts],
    [RankEnum::Five, SuitEnum::Hearts],
    [RankEnum::Six, SuitEnum::Hearts],
    [RankEnum::Seven, SuitEnum::Hearts],
    [RankEnum::Eight, SuitEnum::Hearts],
    [RankEnum::Nine, SuitEnum::Hearts],
    [RankEnum::Ten, SuitEnum::Hearts],
    [RankEnum::Jack, SuitEnum::Hearts],
    [RankEnum::Queen, SuitEnum::Hearts],
    [RankEnum::King, SuitEnum::Hearts],
    [RankEnum::Ace, SuitEnum::Spades],
    [RankEnum::Two, SuitEnum::Spades],
    [RankEnum::Three, SuitEnum::Spades],
    [RankEnum::Four, SuitEnum::Spades],
    [RankEnum::Five, SuitEnum::Spades],
    [RankEnum::Six, SuitEnum::Spades],
    [RankEnum::Seven, SuitEnum::Spades],
    [RankEnum::Eight, SuitEnum::Spades],
    [RankEnum::Nine, SuitEnum::Spades],
    [RankEnum::Ten, SuitEnum::Spades],
    [RankEnum::Jack, SuitEnum::Spades],
    [RankEnum::Queen, SuitEnum::Spades],
    [RankEnum::King, SuitEnum::Spades],
    [RankEnum::Ace, SuitEnum::Clubs],
    [RankEnum::Two, SuitEnum::Clubs],
    [RankEnum::Three, SuitEnum::Clubs],
    [RankEnum::Four, SuitEnum::Clubs],
    [RankEnum::Five, SuitEnum::Clubs],
    [RankEnum::Six, SuitEnum::Clubs],
    [RankEnum::Seven, SuitEnum::Clubs],
    [RankEnum::Eight, SuitEnum::Clubs],
    [RankEnum::Nine, SuitEnum::Clubs],
    [RankEnum::Ten, SuitEnum::Clubs],
    [RankEnum::Jack, SuitEnum::Clubs],
    [RankEnum::Queen, SuitEnum::Clubs],
    [RankEnum::King, SuitEnum::Clubs]
    
    ];


test("check name is string", function (StandardPlayingCard $card)
{
    expect($card->getName())->toBeString();
})->with(function()
{
    $deck = [];
    foreach (SuitEnum::cases() as $suit)
    {
        foreach (RankEnum::cases() as $rank)
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
    foreach (SuitEnum::cases() as $suit)
    {
        foreach (RankEnum::cases() as $rank)
        {
            $deck[] = new StandardPlayingCard($rank, $suit);
        }
    }
    return $deck;
});

test("check card in predicted cards", function (StandardPlayingCard $card)
{
    GLOBAL $expectedCards;
    print_r($expectedCards);
    expect($expectedCards)->toContain([$card->getRank(), $card->getSuit()]);
})->with(function()
{
    $deck = [];
    foreach (SuitEnum::cases() as $suit)
    {
        foreach (RankEnum::cases() as $rank)
        {
            $deck[] = new StandardPlayingCard($rank, $suit);
        }
    }
    return $deck;
});

test("check sort", function ()
{
    $deck = new Deck();
    foreach (SuitEnum::cases() as $suit)
    {
        foreach (RankEnum::cases() as $rank)
        {
            $deck->append(new StandardPlayingCard($rank, $suit));
        }
    }
    $sortedDeck = StandardPlayingCard::sort($deck);
    expect($sortedDeck)->toBeInstanceOf(Deck::class)
        ->and($sortedDeck[0])->toBeInstanceOf(StandardPlayingCard::class)
        ->and($sortedDeck[0]->getRank())->toEqual(RankEnum::Two)
        ->and($sortedDeck[count($sortedDeck)-1]->getRank())->toEqual(RankEnum::Ace);
});
