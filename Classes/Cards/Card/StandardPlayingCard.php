<?php

Abstract class StandardPlayingCard implements ICard
{
    private Suit $suit;
    private Rank $rank;

    /**
     * @param array $hand
     * @return int
     */
    public function getValue(array $hand): int
    {
        if ($this->rank = Rank::Ace)
        {
            return $this->rank->value;
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

    public function getName(): string
    {
        return $this->rank->name." of ".$this->suit->name;
    }
}