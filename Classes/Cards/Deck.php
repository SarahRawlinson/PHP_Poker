<?php

class Deck extends ArrayObject
{
    /**
     * @param $key
     * @param $value
     * @return Deck
     */
    #[ReturnTypeWillChange] public function offsetSet($key, $value) : Deck
    {
        if ($value instanceof ICard) return parent::offsetSet($key, $value);
        throw new \InvalidArgumentException('Value must be type ICard');
    }

    /**
     * @param Deck $deck
     * @return void
     */
    public function array_merge(Deck $deck): void
    {
        foreach ($deck as $card)
        {
            if ($card instanceof ICard)
            {
                parent::append($card);
            }
            else
            {
                throw new \InvalidArgumentException('Values must be type ICard');
            }
        }        
    }

    /**
     * @param ICard $card
     * @return void
     */
    public function remove_card(ICard $card): void
    {
        if (($key = array_search($card, (array)$this)) !== false) {
            unset($this[$key]);
        }
        else
        {
            throw new \InvalidArgumentException('ICard not found in Deck');
        }
    }
}