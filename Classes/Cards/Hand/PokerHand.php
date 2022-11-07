<?php

class PokerHand extends CardHand
{

    public function workOutHand(): int
    {
        switch (true)
        {
            case Flush::isRoyalFlush($this->deck)[0]:
            {
                return PokerHandEnum::Royal_Flush->value;
            }
            case Flush::isStraightFlush($this->deck)[0]:
            {
                return PokerHandEnum::Straight_Flush->value;
            }
            case Duplicates::isOfAKind($d = Duplicates::GetRankDuplicates($this->deck), 4)[0]:
            {
                return PokerHandEnum::Four_Of_A_Kind->value;
            }
            case Duplicates::isFullHouse($d)[0]:
            {
                return PokerHandEnum::Full_House->value;
            }
            case Flush::isFlush($this->deck)[0]:
            {
                return PokerHandEnum::Flush->value;
            }
            case Straight::isStraight($this->deck)[0]:
            {
                return PokerHandEnum::Straight->value;
            }
            case Duplicates::isOfAKind($d, 3)[0]:
            {
                return PokerHandEnum::Three_Of_A_Kind->value;
            }
            case Duplicates::isOfAKind($d, 2)[2] == 2:
            {
                return PokerHandEnum::Two_Pair->value;
            }
            case Duplicates::isOfAKind($d, 2)[0]:
            {
                return PokerHandEnum::Pair->value;
            }
            default:
            {
                return PokerHandEnum::HighCard->value;
            }
        }
    }
    
    

}