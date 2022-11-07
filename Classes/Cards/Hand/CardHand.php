<?php

abstract class CardHand implements IHand
{

    protected Deck $deck;
    

    /**
     * @param Deck $deck
     */
    public function __construct(Deck $deck = new Deck())
    {
        $this->deck = $deck;
    }


    /**
     * @return Deck
     */
    public function getCards(): Deck
    {
        return $this->deck;
    }

    /**
     * @param Deck $cards
     * @return void
     */
    public function addCards(Deck $cards): void
    {
        $this->deck->array_merge($cards);
    }

    /**
     * @param ICard $card
     * @return ICard
     */
    public function removeCard(ICard $card): ICard
    {
        return $this->deck->remove_card($card);
    }

    /**
     * @return Deck
     */
    public function clearCards(): Deck
    {
        $deck = new Deck();
        echo $this->deck->count()-1;
        for ($i = $this->deck->count() -1; $i >= 0; $i--)
        {
            $deck->append($this->removeCard($this->deck[$i]));
        }
        return $deck;
    }

    /**
     * @return int
     * need to work on
     */
    public function getValue(): int
    {
        return $this->workOutHand();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        // TODO: Implement getName() method.
        return "";
    }
}