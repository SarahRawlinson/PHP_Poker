<?php

class Deck extends ArrayObject
{
    #[ReturnTypeWillChange] public function offsetSet($key, $value) {
        if ($value instanceof ICard) return parent::offsetSet($key, $value);
        throw new \InvalidArgumentException('Value must be type ICard');
    }

    public function array_merge(Deck $deck)
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
    
    public function remove_card(ICard $card)
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