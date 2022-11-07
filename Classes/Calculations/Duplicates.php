<?php
class Duplicates
{
    /**
     * @param Deck $deck
     * @return array
     * [
     *      'duplicate found' => bool,
     *      'log' =>
     *          [
     *              {RankEnum}->name =>
     *                  [
     *                      'has duplicate' => bool,
     *                      'duplicate number' => int,
     *                      'array' => Cards[]
     *                  ]
     *          ]
     * ]
     */
    static function GetRankDuplicates(Deck $deck): array
    {
        $ranks = [];
        foreach ($deck as $card)
        {
            if ($card instanceof StandardPlayingCard)
            {
                $ranks[$card->getRank()->name][] = $card;
            }
            else{
                throw new \InvalidArgumentException('Deck must only contain type Standard Playing Card');
            }            
        }
        return self::DuplicateLog($ranks);
    }

    /**
     * @param Deck $deck
     * @return array
     * [
     *      'duplicate found' => bool,
     *      'log' =>
     *          [
     *              {SuitEnum}->name =>
     *                  [
     *                      'has duplicate' => bool,
     *                      'duplicate number' => int,
     *                      'array' => Cards[]
     *                  ]
     *          ]
     * ]
     */
    static function GetSuitDuplicates(Deck $deck): array
    {
        $ranks = [];
        foreach ($deck as $card)
        {
            if ($card instanceof StandardPlayingCard) 
            {
                $ranks[$card->getSuit()->name][] = $card;
            }
            else{
                throw new \InvalidArgumentException('Deck must only contain type Standard Playing Card');
            }           
            
        }
        return self::DuplicateLog($ranks);
    }

    /**
     * @param array $duplicateArray
     * @return array 
     * [
     *      'duplicate found' => bool, 
     *      'log' => 
     *          [
     *              $duplicateArray['key']->key => 
     *                  [
     *                      'has duplicate' => bool, 
     *                      'duplicate number' => int, 
     *                      'array' => [ $duplicateArray['key']->value ] 
     *                  ] 
     *          ] 
     * ]
     */
    public static function DuplicateLog(array $duplicateArray): array
    {
        $returnLog = [];
        $duplicate = false;
        foreach ($duplicateArray as $key => $value) {
            $num = count($value);
            if ($num > 0) $duplicate = true;
            $returnLog[$key]['has duplicate'] = $num > 0;
            $returnLog[$key]['duplicate number'] = $num - 1;
            $returnLog[$key]['array'] = $value;
        }
        return ['duplicate found' => $duplicate, 'log' => $returnLog];
    }

    /**
     * @param $log
     * @return array
     */
    public static function isFullHouse($log): array
    {
        $newTwoCards = [];
        $newThreeCards = [];
        $foundThree = false;
        $foundTwo = false;
        foreach ($log['log'] as $cards) {
            if ($cards['duplicate number'] == 2) {
                $foundThree = true;
                $newThreeCards[] = $cards['array'];
            }

            if ($cards['duplicate number'] == 1) {
                $foundTwo = true;
                $newTwoCards[] = $cards['array'];
            }
        }
        $found = false;
        $newLog = [];
        if ($foundThree && $foundTwo) {
            $found = true;
            foreach ($newThreeCards as $three) {
                foreach ($newTwoCards as $two) {
                    $newLog[] = array_merge($three, $two);
                }
            }
        }
        return [$found, $newLog];
    }

    /**
     * @param $log
     * @param $qty
     * @return array
     */
    public static function isOfAKind($log, $qty): array
    {
        $newLog = [];
        $found = false;
        foreach ($log['log'] as $cards)
        {
            if ($cards['duplicate number'] == $qty -1)
            {
                $found = true;
                $newLog[] = $cards['array'];
            }
        }
        return [$found, $newLog, count($newLog)];
    }
}