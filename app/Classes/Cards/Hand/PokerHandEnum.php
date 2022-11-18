<?php namespace App\Classes\Cards\Hand;
enum PokerHandEnum: int
{
    case HighCard = 1;
    case Pair = 2;
    case Two_Pair = 3;
    case Three_Of_A_Kind = 4;
    case Straight = 5;
    case Flush = 6;
    case Full_House = 7;
    case Four_Of_A_Kind = 8;
    case Straight_Flush = 9;
    case Royal_Flush = 10;

}
