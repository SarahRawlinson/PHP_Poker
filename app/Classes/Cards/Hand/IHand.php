<?php namespace App\Classes\Cards\Hand;

use App\Classes\Cards\Card\ICard;
use App\Classes\Cards\Deck;

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
