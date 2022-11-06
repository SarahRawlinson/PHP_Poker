<?php
class Flush
{
    /**
     * @param Deck $deck
     * @return array
     */
    public static function isFlush(Deck $deck): array
    {
        $flushes = [];
        foreach (Duplicates::GetSuitDuplicates($deck)['log'] as $duplicate)
        {
            if ($duplicate['duplicate number'] >= 4)
            {
                $flushes[] = $duplicate['array'];
            }
        }
        return [count($flushes)>0, $flushes];
    }

    /**
     * @param Deck $deck
     * @return array
     */
    public static function isStraightFlush(Deck $deck): array
    {
        $straightFlushes = [];
        foreach (self::isFlush($deck)[1] as $cards)
        {
            $cardsDeck = new Deck($cards);
            $straightArray = Straight::isStraight($cardsDeck)[1];
            foreach ($straightArray as $hand)
            {
                
                $newDeck = new Deck();
                foreach ($hand as $card)
                {
                    $newDeck->array_merge(new Deck($card));
                }
                $straightFlushes[] = $newDeck;
            }
//            $straightFlushes = new Deck(Straight::isStraight($cardsDeck)[1]);
        }
        return [count($straightFlushes)>0,$straightFlushes];
    }

    /**
     * @param Deck $deck
     * @return array
     */
    public static function isRoyalFlush(Deck $deck): array
    {
        $straightFlushes = self::isStraightFlush($deck);
        $cardsFound = false;
        $royalFlushDeck = new Deck();
        if ($straightFlushes[0])
        {
            foreach ($straightFlushes[1] as $straightFlush)
            {
                $aceFoundInStraight = false;
                $kingFoundInStraight = false;
                foreach ($straightFlush as $card)
                {
                    if ($card instanceof StandardPlayingCard) 
                    {
                        if ($card->getRank() == RankEnum::Ace) {
                            $aceFoundInStraight = true;
                        }
                        if ($card->getRank() == RankEnum::King) {
                            $kingFoundInStraight = true;
                        }
                    }
                    else 
                    {
                        throw new \InvalidArgumentException('array must only contain type Standard Playing Card');
                    }
                    if ($kingFoundInStraight && $aceFoundInStraight)
                    {
                        $cardsFound = true;
                        $royalFlushDeck = $straightFlush;
                    }
                }
                               
            }
        }
        print_r([$cardsFound, $royalFlushDeck]); 
        return [$cardsFound, $royalFlushDeck];
    }
    
    
}
