<?php
//namespace App\Classes\Player;
////TODO: Test
//use ReturnTypeWillChange;

class PlayerGroup extends ArrayObject
{
    /**
     * @param $key
     * @param $value
     * @return PlayerGroup
     */
    #[ReturnTypeWillChange] public function offsetSet($key, $value): PlayerGroup
    {
        if ($value instanceof IPerson) return parent::offsetSet($key, $value);
        throw new \InvalidArgumentException('Value must be type IPerson');
    }

    /**
     * @param PlayerGroup $players
     * @return void
     */
    public function array_merge(PlayerGroup $players): void
    {
        foreach ($players as $player) {
            if ($player instanceof IPerson) {
                parent::append($player);
            } else {
                throw new \InvalidArgumentException('Values must be type IPerson');
            }
        }
    }

    /**
     * @param IPerson $player
     * @return void
     */
    public function remove_card(IPerson $player): void
    {
        if (($key = array_search($player, (array)$this)) !== false) {
            unset($this[$key]);
        } else {
            throw new \InvalidArgumentException('IPerson not found in PlayerGroup');
        }
    }
}
