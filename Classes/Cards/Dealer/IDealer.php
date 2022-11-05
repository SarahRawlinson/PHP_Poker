<?php

interface IDealer
{
    public function shuffleCards();
    public function deal(PlayerGroup $playerGroup, int $qty);
    public function collectCards(Deck $deck);
}