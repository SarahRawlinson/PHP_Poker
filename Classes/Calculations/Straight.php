<?php

class Straight
{

    /**
     * @param Deck $deck
     * @return array
     */
    public static function isStraight(Deck $deck): array
    {
        $array = [];
        foreach ($deck as $card)
        {
            if ($card->getRank() == RankEnum::Ace)
            {
                $array[1][] = $card;
            }
            $array[$card->getValue()][] = $card;
        }
        $continuous = 0;
        $straights = [];
        
        for ($i = 1; $i <= 14; $i++)
        {
            if (isset($array[$i]))
            {
                $continuous++;
            }
            else
            {
                $continuous = 0;
            }
            if ($continuous >= 5)
            {
                $straight = [];
                for ($j=0;$j<5;$j++)
                {
                    $straight[] = $array[$i-$j];
                }
                $straights[] = $straight;
            }
        }
        return [count($straights)>0, $straights];
    }
}