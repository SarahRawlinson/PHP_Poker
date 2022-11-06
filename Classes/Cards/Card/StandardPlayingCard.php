<?php

use JetBrains\PhpStorm\Pure;

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
     * @param IHand $hand
     * @return int
     */
    public function getValue(IHand $hand): int
    {
        if ($this->rank = RankEnum::Ace)
        {
            //TODO
            //workout how to give ace two values depending on Hand
        }
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
        return $this->rank->name." of ".$this->suit->name;
    }


    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->rank->name."_of_".$this->suit->name.".png";
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
}