<?php

interface IHand
{
    public function getCards(): Deck;
    public function addCards(Deck $cards);
    public function removeCard(ICard $card);
    public function clearCards();
    public function getValue();
}