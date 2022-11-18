<?php namespace App\Classes\Player;

use App\Classes\Cards\Deck;


interface IPerson
{
    public function getName(): string;

    public function giveCards(Deck $deck): void;
}
