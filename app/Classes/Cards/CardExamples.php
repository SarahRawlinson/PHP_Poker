<?php namespace App\Classes\Cards;

use App\Classes\Cards\Card\RankEnum;
use App\Classes\Cards\Card\StandardPlayingCard;
use App\Classes\Cards\Card\SuitEnum;

class CardExamples
{
    /**
     * @return Deck
     */
    public static function getRoyalFlush(): Deck
    {
        $cards = [
            new StandardPlayingCard(RankEnum::Ace, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::King, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Queen, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Jack, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Ten, SuitEnum::Clubs)
        ];
        return new Deck($cards);
    }

    /**
     * @return Deck
     */
    public static function getStraightFlush(): Deck
    {
        $cards = [
            new StandardPlayingCard(RankEnum::Ace, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Three, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Four, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Clubs)
        ];
        return new Deck($cards);
    }

    /**
     * @return Deck
     */
    public static function getFourOfAKind(): Deck
    {
        $cards = [
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Hearts),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Diamonds),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Spades),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Clubs)
        ];
        return new Deck($cards);
    }

    /**
     * @return Deck
     */
    public static function getFourFullHouse(): Deck
    {
        $cards = [
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Hearts),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Diamonds),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Spades),
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Diamonds)
        ];
        return new Deck($cards);
    }

    /**
     * @return Deck
     */
    public static function getFlush(): Deck
    {
        $cards = [
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Hearts),
            new StandardPlayingCard(RankEnum::Ace, SuitEnum::Hearts),
            new StandardPlayingCard(RankEnum::Jack, SuitEnum::Hearts),
            new StandardPlayingCard(RankEnum::Four, SuitEnum::Hearts),
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Hearts)
        ];
        return new Deck($cards);
    }

    /**
     * @return Deck
     */
    public static function getStraight(): Deck
    {
        $cards = [
            new StandardPlayingCard(RankEnum::Ace, SuitEnum::Hearts),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Diamonds),
            new StandardPlayingCard(RankEnum::Three, SuitEnum::Spades),
            new StandardPlayingCard(RankEnum::Four, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Hearts)
        ];
        return new Deck($cards);
    }

    /**
     * @return Deck
     */
    public static function getThreeOfAKind(): Deck
    {
        $cards = [
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Hearts),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Diamonds),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Spades),
            new StandardPlayingCard(RankEnum::Four, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Clubs)
        ];
        return new Deck($cards);
    }

    /**
     * @return Deck
     */
    public static function getTwoPair(): Deck
    {
        $cards = [
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Hearts),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Diamonds),
            new StandardPlayingCard(RankEnum::Three, SuitEnum::Spades),
            new StandardPlayingCard(RankEnum::Three, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Clubs)
        ];
        return new Deck($cards);
    }

    /**
     * @return Deck
     */
    public static function getPair(): Deck
    {
        $cards = [
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Hearts),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Diamonds),
            new StandardPlayingCard(RankEnum::Six, SuitEnum::Spades),
            new StandardPlayingCard(RankEnum::Eight, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Clubs)
        ];
        return new Deck($cards);
    }

    /**
     * @return Deck
     */
    public static function getHighCard(): Deck
    {
        $cards = [
            new StandardPlayingCard(RankEnum::Ace, SuitEnum::Hearts),
            new StandardPlayingCard(RankEnum::Two, SuitEnum::Diamonds),
            new StandardPlayingCard(RankEnum::Five, SuitEnum::Spades),
            new StandardPlayingCard(RankEnum::Eight, SuitEnum::Clubs),
            new StandardPlayingCard(RankEnum::Ten, SuitEnum::Clubs)
        ];
        return new Deck($cards);
    }
}
