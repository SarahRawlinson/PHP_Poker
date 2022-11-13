<?php
//namespace App\Classes\Cards\Card;
//
//use App\Classes\Cards\Deck;
//use JetBrains\PhpStorm\Pure;

class StandardPlayingCard implements ICard
{
    private RankEnum $rank;
    private SuitEnum $suit;

    /**
     * @param RankEnum $rank
     * @param SuitEnum $suit
     */
    public function __construct(RankEnum $rank, SuitEnum $suit)
    {
        $this->suit = $suit;
        $this->rank = $rank;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->rank->value;
    }

    /**
     * @return RankEnum
     */
    public function getRank(): RankEnum
    {
        return $this->rank;
    }

    /**
     * @return SuitEnum
     */
    public function getSuit(): SuitEnum
    {
        return $this->suit;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->rank->name . " of " . $this->suit->name;
    }


    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->rank->name . "_of_" . $this->suit->name . ".png";
    }

    /**
     * @return string
     */
    #[Pure] public function __toString(): string
    {
        return $this->getName();
    }

    /**
     * @return array
     */
    #[Pure] public function __debugInfo()
    {
        return [$this->getName()];
    }

    /**
     * @param StandardPlayingCard $card1
     * @param StandardPlayingCard $card2
     * @return int
     */
    #[Pure] public static function compareRank(StandardPlayingCard $card1, StandardPlayingCard $card2): int
    {
        return $card1->getRank()->value <=> $card2->getRank()->value;
    }

    /**
     * @param Deck $deck
     * @return Deck
     */
    public static function sort(Deck $deck): Deck
    {
        $copy = $deck->getArrayCopy();
        usort($copy, function ($a, $b) {
            return self::compareRank($a, $b);
        });
        return new Deck($copy);
    }

    public function getImagePath(): string
    {
        return 'assets/card_images/card_face/' . $this->getImage();
    }
}
