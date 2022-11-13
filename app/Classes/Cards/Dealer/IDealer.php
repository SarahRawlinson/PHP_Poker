<?php
//namespace App\Classes\Cards\Dealer;
//
//use App\Classes\Cards\Deck;
//use App\Classes\Player\PlayerGroup;

interface IDealer
{
    public function shuffleCards();

    public function deal(PlayerGroup $playerGroup, int $qty);

    public function collectCards(Deck $deck);
}
