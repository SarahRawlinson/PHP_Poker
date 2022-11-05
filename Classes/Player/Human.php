<?php

//namespace Poker\Classes\Player;
class Human implements IPerson
{
    private string $name = "";
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param Deck $deck
     * @return void
     */
    public function giveCards(Deck $deck): void
    {
        // TODO: Implement giveCards() method.
    }
}