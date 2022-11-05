<?php

interface IDealer
{
    public function shuffleCards();
    public function deal(PlayerGroup $playerGroup);
    public function collectCards(Deck $deck);
}