<?php

interface IDealer
{
    public function shuffleCards();
    public function deal();
    public function collectCards(Deck $deck);
}