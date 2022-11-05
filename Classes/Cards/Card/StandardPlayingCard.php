<?php

use JetBrains\PhpStorm\Pure;

class StandardPlayingCard implements ICard
{
    private Rank $rank;
    private Suit $suit;

    /**
     * @param Rank $rank
     * @param Suit $suit
     */
    public function __construct(Rank $rank, Suit $suit)
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
        if ($this->rank = Rank::Ace)
        {
            //TODO
            //workout how to give ace two values depending on Hand
        }
        return $this->rank->value;
    }

    /**
     * @return Rank
     */
    public function getRank(): Rank
    {
        return $this->rank;
    }

    /**
     * @return Suit
     */
    public function getSuit(): Suit
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