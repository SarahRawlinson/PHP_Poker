<?php
include_once ("Include.php");

test('check Hand get cards returns Deck', function (){
    $deck = new Deck([
        new StandardPlayingCard(Rank::King, Suit::Hearts),
        new StandardPlayingCard(Rank::Queen, Suit::Hearts)
        ]);
    $hand = new StandardPlayerCardHand($deck);
    expect($cards = $hand->getCards())->toEqual($deck)
        ->and($cards)->toBeInstanceOf(Deck::class);
});

test('check Hand adds cards', function (){
    $deck = new Deck([
        new StandardPlayingCard(Rank::King, Suit::Hearts),
        new StandardPlayingCard(Rank::Queen, Suit::Hearts)
    ]);
    $deck2 = new Deck([
        new StandardPlayingCard(Rank::Jack, Suit::Hearts),
        new StandardPlayingCard(Rank::Ace, Suit::Hearts)
    ]);
    $hand = new StandardPlayerCardHand($deck);
    $hand->addCards($deck2);
    expect($cards = $hand->getCards())->toContain($deck2[0],$deck2[1])
        ->and(count($cards))->toEqual(4);
});


test('check Hand removes cards', function (){
    $card1 = new StandardPlayingCard(Rank::King, Suit::Hearts);
    $card2 = new StandardPlayingCard(Rank::Queen, Suit::Hearts);
    $deck = new Deck([
        $card1,
        $card2
    ]);
    $hand = new StandardPlayerCardHand($deck);
    $hand->removeCard($card1);
    expect($cards = $hand->getCards())->toContain($card2)
        ->and($cards)->not()->toContain($card1)
        ->and(count($cards))->toEqual(1);
});

test('check Hand clear cards', function (){
    $card1 = new StandardPlayingCard(Rank::King, Suit::Hearts);
    $card2 = new StandardPlayingCard(Rank::Queen, Suit::Hearts);
    $deck = new Deck([
        $card1,
        $card2
    ]);
    $hand = new StandardPlayerCardHand($deck);
    expect($cards1 = $hand->clearCards())->toContain($card1, $card2)
        ->and($cards2 = $hand->getCards())->not()->toContain($card1, $card2)
        ->and(count($cards1))->toEqual(2)
        ->and(count($cards2))->toEqual(0);
});