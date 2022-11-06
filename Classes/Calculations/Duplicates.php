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
            $ranks[$card->getRank()->name][] = $card;
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
            
            $ranks[$card->getSuit()->name][] = $card;
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
        //echo print_r($returnLog);
        return ['duplicate found' => $duplicate, 'log' => $returnLog];
    }
}