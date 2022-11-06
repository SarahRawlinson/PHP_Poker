<?php
include_once ("Include.php");

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