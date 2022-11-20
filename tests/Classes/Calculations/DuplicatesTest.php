<?php

use App\Classes\Calculations\Duplicates;
use App\Classes\Cards\Card\StandardPlayingCard;
use App\Classes\Cards\CardExamples;
use App\Classes\Cards\Dealer\StandardPlayingCardDealer;


test('test rank duplicates returns true in log', function () {
    $deck = StandardPlayingCardDealer::createDeck();
    $log = Duplicates::GetRankDuplicates($deck);
    expect($log['duplicate found'])->toBeTrue();
});

test('test rank duplicates', function ($hasDuplicate, $numOfDuplicates, $cards) {
    expect($hasDuplicate)->toBeTrue()
    ->and($numOfDuplicates)->toEqual(3);

})->with(function ()
{
    $deck = StandardPlayingCardDealer::createDeck();
    $log = Duplicates::GetRankDuplicates($deck);
    $array = [];
    foreach ($log['log'] as $key1 => $value1)
    {
        $array[] = $value1;
    }
    return $array;
});

test('test Suit duplicates', function ($hasDuplicate, $numOfDuplicates, $cards) {
    expect($hasDuplicate)->toBeTrue()
        ->and($numOfDuplicates)->toEqual(12);

})->with(function ()
{
    $deck = StandardPlayingCardDealer::createDeck();
    $log = Duplicates::GetSuitDuplicates($deck);
    $array = [];
    foreach ($log['log'] as $key1 => $value1)
    {
        $array[] = $value1;
    }
    return $array;
});

test('test full house', function () {

    $log = Duplicates::GetRankDuplicates(CardExamples::getFourFullHouse());
    expect(Duplicates::isFullHouse($log)[0])->toBeTrue();

});

test('test 2 of a kind', function () {

    $log = Duplicates::GetRankDuplicates(CardExamples::getPair());
    $returned = Duplicates::isOfAKind($log, 2);
    expect($returned[0])->toBeTrue()
        ->and($returned[2])->toEqual(1)
        ->and(count($returned[1][0]))->toEqual(2)
        ->and($returned[1][0][0])->toBeInstanceOf(StandardPlayingCard::class);

});

test('test pair of 2 of a kind', function () {

    $log = Duplicates::GetRankDuplicates(CardExamples::getTwoPair());
    $returned = Duplicates::isOfAKind($log, 2);
    expect($returned[0])->toBeTrue()
        ->and($returned[2])->toEqual(2)
        ->and(count($returned[1][0]))->toEqual(2)
        ->and(count($returned[1][1]))->toEqual(2)
        ->and($returned[1][0][0])->toBeInstanceOf(StandardPlayingCard::class);

});

test('test 3 of a kind', function () {

    $log = Duplicates::GetRankDuplicates(CardExamples::getThreeOfAKind());
    $returned = Duplicates::isOfAKind($log, 3);
    expect($returned[0])->toBeTrue()
        ->and($returned[2])->toEqual(1)
        ->and(count($returned[1][0]))->toEqual(3)
        ->and($returned[1][0][0])->toBeInstanceOf(StandardPlayingCard::class);

});

test('test 4 of a kind', function () {

    $log = Duplicates::GetRankDuplicates(CardExamples::getFourOfAKind());
    $returned = Duplicates::isOfAKind($log, 4);
    expect($returned[0])->toBeTrue()
        ->and($returned[2])->toEqual(1)
        ->and(count($returned[1][0]))->toEqual(4)
        ->and($returned[1][0][0])->toBeInstanceOf(StandardPlayingCard::class);

});

test('test high card for of a kind', function () {

    $log = Duplicates::GetRankDuplicates(CardExamples::getHighCard());
    $returned = Duplicates::isOfAKind($log, 2);
    expect($returned[0])->not()->toBeTrue()
        ->and($returned[2])->toEqual(0)
        ->and(count($returned[1]))->toBeEmpty();

});
