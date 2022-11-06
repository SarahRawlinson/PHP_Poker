<?php
include_once("Include.php");

test('check Deck throws exception when give non-card object', function () {
    $deck = new Deck();
    $deck->append(0);
})->throws(Exception::class);

test('check Deck throws exception when object not found to remove', function () {
    $deck = new Deck();
    foreach (RankEnum::cases() as $rank)
    {
        $deck[] = new StandardPlayingCard($rank, SuitEnum::Hearts);
    }
    $deck->remove_card(new StandardPlayingCard(RankEnum::King, SuitEnum::Diamonds));
})->throws(Exception::class);

test('check Deck card can be found and removed by equal rank and suit', function () {
    $deck = new Deck();
    $deck[] = new StandardPlayingCard(RankEnum::King, SuitEnum::Diamonds);
    $newCard = new StandardPlayingCard(RankEnum::King, SuitEnum::Diamonds);    
    expect($returned = $deck->remove_card($newCard))->toEqual($newCard)
        ->and(count($deck))->toEqual(0)
        ->and($returned)->toBeInstanceOf(ICard::class);
});

test('check Deck pop returns first card in array', function () {
    $deck = new Deck();
    $king = new StandardPlayingCard(RankEnum::King, SuitEnum::Diamonds);
    $queen = new StandardPlayingCard(RankEnum::Queen, SuitEnum::Diamonds);
    $deck[] = $king;
    $deck[] = $queen;
    expect($returned = $deck->pop())->toEqual($king)
        ->and(count($deck))->toEqual(1)
        ->and($returned)->toBeInstanceOf(ICard::class);
});

test('check Deck merges with other deck', function(){
    $deck1 = new Deck([new StandardPlayingCard(RankEnum::King, SuitEnum::Diamonds),
        new StandardPlayingCard(RankEnum::Jack, SuitEnum::Diamonds)]);
    $deck2 = new Deck([new StandardPlayingCard(RankEnum::Queen, SuitEnum::Diamonds),
        new StandardPlayingCard(RankEnum::Ace, SuitEnum::Diamonds)]);
    $deck1->array_merge($deck2);
    expect(count($deck1))->toEqual(4)
        ->and($deck1)->toContain($deck2[0],$deck2[1]);
});

test('check Deck throws exception if deck is not created with ICard', function(){
    $object = "";
    $deck1 = new Deck([$object]);
})->throws(Exception::class);

