<?php

use App\Classes\Cards\Card\RankEnum;
use App\Classes\Cards\Card\StandardPlayingCard;
use App\Classes\Cards\Card\SuitEnum;
use App\Classes\Cards\CardExamples;
use App\Classes\Cards\Deck;
use App\Classes\Cards\Hand\PokerHand;
use App\Classes\Cards\Hand\PokerHandEnum;

//include_once("Include.php");

test('check Hand get cards returns Deck', function (){
    $deck = new Deck([
        new StandardPlayingCard(RankEnum::King, SuitEnum::Hearts),
        new StandardPlayingCard(RankEnum::Queen, SuitEnum::Hearts)
        ]);
    $hand = new PokerHand($deck);
    expect($cards = $hand->getCards())->toEqual($deck)
        ->and($cards)->toBeInstanceOf(Deck::class);
});

test('check Hand adds cards', function (){
    $deck = new Deck([
        new StandardPlayingCard(RankEnum::King, SuitEnum::Hearts),
        new StandardPlayingCard(RankEnum::Queen, SuitEnum::Hearts)
    ]);
    $deck2 = new Deck([
        new StandardPlayingCard(RankEnum::Jack, SuitEnum::Hearts),
        new StandardPlayingCard(RankEnum::Ace, SuitEnum::Hearts)
    ]);
    $hand = new PokerHand($deck);
    $hand->addCards($deck2);
    expect($cards = $hand->getCards())->toContain($deck2[0],$deck2[1])
        ->and(count($cards))->toEqual(4);
});


test('check Hand removes cards', function (){
    $card1 = new StandardPlayingCard(RankEnum::King, SuitEnum::Hearts);
    $card2 = new StandardPlayingCard(RankEnum::Queen, SuitEnum::Hearts);
    $deck = new Deck([
        $card1,
        $card2
    ]);
    $hand = new PokerHand($deck);
    $hand->removeCard($card1);
    expect($cards = $hand->getCards())->toContain($card2)
        ->and($cards)->not()->toContain($card1)
        ->and(count($cards))->toEqual(1);
});

test('check Hand clear cards', function (){
    $card1 = new StandardPlayingCard(RankEnum::King, SuitEnum::Hearts);
    $card2 = new StandardPlayingCard(RankEnum::Queen, SuitEnum::Hearts);
    $deck = new Deck([
        $card1,
        $card2
    ]);
    $hand = new PokerHand($deck);
    expect($cards1 = $hand->clearCards())->toContain($card1, $card2)
        ->and($cards2 = $hand->getCards())->not()->toContain($card1, $card2)
        ->and(count($cards1))->toEqual(2)
        ->and(count($cards2))->toEqual(0);
});

test('check workout hand returns correct', function ($expect, $hand){

    $pokerHand = new PokerHand($hand);

    expect(PokerHandEnum::tryfrom($pokerHand->workOutHand()))->toEqual($expect);
})->with(function ()
{
    return [
        [PokerHandEnum::HighCard, CardExamples::getHighCard()],
        [PokerHandEnum::Pair, CardExamples::getPair()],
        [PokerHandEnum::Two_Pair, CardExamples::getTwoPair()],
        [PokerHandEnum::Three_Of_A_Kind, CardExamples::getThreeOfAKind()],
        [PokerHandEnum::Straight, CardExamples::getStraight()],
        [PokerHandEnum::Flush, CardExamples::getFlush()],
        [PokerHandEnum::Full_House, CardExamples::getFourFullHouse()],
        [PokerHandEnum::Four_Of_A_Kind, CardExamples::getFourOfAKind()],
        [PokerHandEnum::Straight_Flush, CardExamples::getStraightFlush()],
        [PokerHandEnum::Royal_Flush, CardExamples::getRoyalFlush()]
        ];
});
