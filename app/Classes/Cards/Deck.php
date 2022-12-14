<?php namespace App\Classes\Cards;

use App\Classes\Cards\Card\ICard;
use ArrayObject;
use InvalidArgumentException;
use ReturnTypeWillChange;

class Deck extends ArrayObject
{
    /**
     * @param $key
     * @param $value
     * @return Deck|void
     */
    #[ReturnTypeWillChange] public function offsetSet($key, $value)
    {
        if ($value instanceof ICard) {
            return parent::offsetSet($key, $value);
        } else {
            return throw new InvalidArgumentException('Value must be type ICard');
        }
    }

    /**
     * @param object|array $array
     * @param int $flags
     * @param string $iteratorClass
     */
    public function __construct(object|array $array = [], int $flags = 0, string $iteratorClass = "ArrayIterator")
    {
        if (is_array($array)) {
            foreach ($array as $object) {
                if (!$object instanceof ICard) {
                    throw new InvalidArgumentException('Value must be type ICard' . $object);
                }
            }
        }
        parent::__construct($array, $flags, $iteratorClass);
    }

    /**
     * @param Deck $deck
     * @return void
     */
    public function array_merge(self $deck): void
    {
        foreach ($deck as $card) {
            if ($card instanceof ICard) {
                parent::append($card);
            } else {
                throw new InvalidArgumentException('Values must be type ICard');
            }
        }
    }

    /**
     * @param ICard $card
     * @return ICard
     */
    public function remove_card(ICard $card): ICard
    {
        if (($key = array_search($card, (array)$this)) !== false) {
            $card = $this[$key];
            parent::offsetUnset($key);
            return $card;
        } else {
            throw new InvalidArgumentException('ICard not found in Deck');
        }
    }

    /**
     * @return mixed
     */
    public function pop(): mixed
    {
        $copy = parent::getArrayCopy();
        $last = array_key_last($copy);
        $card = $copy[$last];
        parent::offsetUnset($last);
        return $card;
    }


    /**
     * @return string
     */
    public function __toString(): string
    {
        $string = "\n[";
        foreach ($this as $card) {
            $string .= $card . ",\n";
        }
        if ($this->count() > 0) {
            $string = substr($string, 0, -2);
        }
        return $string . "]\n";
    }

    /**
     * @return Deck
     */
    public function randomize(): self
    {
        $deck = parent::getArrayCopy();
        if (shuffle($deck)) {
            return new self($deck);

        }
        echo "couldn't shuffle";
        return $this;
    }


}
