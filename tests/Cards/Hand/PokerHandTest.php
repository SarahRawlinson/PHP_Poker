<?php
include_once("Include.php");

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