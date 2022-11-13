<?php
//namespace App\Classes\Calculations;
//
//use App\Classes\Cards\Card\RankEnum;
//use App\Classes\Cards\Card\StandardPlayingCard;
//use App\Classes\Cards\Deck;

class Straight
{

    /**
     * @param Deck $deck
     * @return array
     */
    public static function isStraight(Deck $deck): array
    {
        $array = [];
        foreach ($deck as $card) {
            if ($card instanceof StandardPlayingCard) {
                if ($card->getRank() == RankEnum::Ace) {
                    $array[1][] = $card;
                }
                $array[$card->getValue()][] = $card;
            } else {
                throw new \InvalidArgumentException('Deck must only contain type Standard Playing Card');
            }
        }
        $continuous = 0;
        $straights = [];

        for ($i = 1; $i <= 14; $i++) {
            if (isset($array[$i])) {
                $continuous++;
            } else {
                $continuous = 0;
            }
            if ($continuous >= 5) {
                $straight = [];
                for ($j = 0; $j < 5; $j++) {
                    $straight[] = $array[$i - $j];
                }
                $straights[] = $straight;
            }
        }
        return [count($straights) > 0, $straights];
    }
}
