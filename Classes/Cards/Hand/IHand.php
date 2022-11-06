<?php

interface IHand
{
    public function getCards(): Deck;
    public function addCards(Deck $cards): void;
    public function removeCard(ICard $card): ICard;
    public function clearCards(): Deck;
    public function getValue(): int;
    public function getName(): string;
    public function workOutHand(): int;
}