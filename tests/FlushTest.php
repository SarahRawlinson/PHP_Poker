<?php
include_once ("Include.php");

test('check 7 matching suit returns flush true', function () {
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
    $flush = Flush::isFlush($deck);
    expect($flush[0])->toBeTrue()
        ->and(count($flush[1]))->toEqual(1)
        ->and(count($flush[1][0]))->toEqual(7)
        ->and($flush[1][0][0])->toBeInstanceOf(StandardPlayingCard::class);;

});

test('check 5 of same suit continuous returns straight flush true', function () {
    $deck = new Deck(
        [
            new StandardPlayingCard(RankEnum::Ace, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Three, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Four, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Clubs)
        ]
    );
    $flush = Flush::isStraightFlush($deck);
    expect($flush[0])->toBeTrue()
        ->and(count($flush[1]))->toEqual(1)
        ->and(count($flush[1][0]))->toEqual(5)
        ->and($flush[1][0][0])->toBeInstanceOf(StandardPlayingCard::class);

});

test('check royal flush cards return royal flush true', function () {
    $deck = new Deck(
        [
            new StandardPlayingCard(RankEnum::Ace, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::King, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Queen, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Jack, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Ten, SuitEnum::Clubs)
        ]
    );
    $flush = Flush::isRoyalFlush($deck);
    expect($flush[0])->toBeTrue()
        ->and(count($flush[1]))->toEqual(1)
        ->and(count($flush[1][0]))->toEqual(5)
        ->and($flush[1][0][0])->toBeInstanceOf(StandardPlayingCard::class);

});

test('check non royal flush cards return royal flush false', function () {
    $deck = new Deck(
        [
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::King, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Queen, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Jack, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Ten, SuitEnum::Clubs)
        ]
    );
    expect(Flush::isRoyalFlush($deck)[0])->not()->toBeTrue();

});

test('check 5 matching suit returns flush true', function () {
    $deck = new Deck(
        [
            new StandardPlayingCard(RankEnum::Ace, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Spades),
            new StandardPlayingCard(RankEnum::Three, SuitEnum::Hearts),
            new StandardPlayingCard(RankEnum::Four, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Six, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Seven, SuitEnum::Clubs)
        ]
    );
    $flush = Flush::isFlush($deck);
    expect($flush[0])->toBeTrue()
        ->and(count($flush[1]))->toEqual(1)
        ->and(count($flush[1][0]))->toEqual(5)
        ->and($flush[1][0][0])->toBeInstanceOf(StandardPlayingCard::class);

});

test('check 4 matching suit returns flush false', function () {
    $deck = new Deck(
        [
            new StandardPlayingCard(RankEnum::Ace, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Spades),
            new StandardPlayingCard(RankEnum::Three, SuitEnum::Hearts),
            new StandardPlayingCard(RankEnum::Four, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Diamonds),
            new StandardPlayingCard(RankEnum::Six, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Seven, SuitEnum::Clubs)
        ]
    );
    expect(Flush::isFlush($deck)[0])->not()->toBeTrue();

});