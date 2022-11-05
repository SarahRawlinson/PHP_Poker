<?php

class StandardPlayerCardHand implements IHand
{

    private Deck $deck;
    

    public function getCards(): Deck
    {
        return $this->deck;
    }

    public function addCards(Deck $cards)
    {
        $this->deck->array_merge($cards);
    }

    public function removeCard(ICard $card)
    {
        $this->deck->remove_card($card);
    }

    public function clearCards()
    {
        $this->deck[] = new Deck();
    }

    public function getValue()
    {
        // TODO: Implement getValue() method.
    }
}