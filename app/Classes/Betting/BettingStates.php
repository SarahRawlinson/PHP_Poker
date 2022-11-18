<?php namespace App\Classes\Betting;
enum BettingStates
{
    case bet;
    case check;
    case fold;
    case raise;
    case call;
}
