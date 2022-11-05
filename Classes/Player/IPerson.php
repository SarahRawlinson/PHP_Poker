<?php
//namespace Poker\Classes\Player;
interface IPerson
{
    public function getName(): string;
    public function giveCards(Deck $deck): void;
}