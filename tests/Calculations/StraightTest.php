<?php

//use App\Classes\Calculations\Straight;
//use App\Classes\Cards\Card\RankEnum;
//use App\Classes\Cards\Card\StandardPlayingCard;
//use App\Classes\Cards\Card\SuitEnum;
//use App\Classes\Cards\Deck;

include_once("Include.php");

test('check low straight returns true', function () {
    $deck = new Deck(
        [
            new StandardPlayingCard(RankEnum::Ace, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Three, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Four, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Clubs)
        ]
    );
    expect(Straight::isStraight($deck)[0])->toBeTrue();

});

test('check high straight returns true', function () {
    $deck = new Deck(
        [
            new StandardPlayingCard(RankEnum::Ace, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::King, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Queen, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Jack, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Ten, SuitEnum::Clubs)
        ]
    );
    expect(Straight::isStraight($deck)[0])->toBeTrue();

});

test('check none straight returns false', function () {
    $deck = new Deck(
        [
            new StandardPlayingCard(RankEnum::Ace, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::King, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Queen, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Jack, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Three, SuitEnum::Clubs)
        ]
    );
    expect(Straight::isStraight($deck)[0])->not()->toBeTrue();

});

test('check 6 continuous returns 2 straight', function () {
    $deck = new Deck(
        [
            new StandardPlayingCard(RankEnum::Ace, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Three, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Four, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Six, SuitEnum::Clubs)
        ]
    );
    expect(count(Straight::isStraight($deck)[1]))->toEqual(2);

});

test('check 7 continuous returns 3 straight', function () {
    $deck = new Deck(
        [
            new StandardPlayingCard(RankEnum::Ace, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Three, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Four, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Six, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Seven, SuitEnum::Clubs)
        ]
    );
    expect(count(Straight::isStraight($deck)[1]))->toEqual(3);

});
