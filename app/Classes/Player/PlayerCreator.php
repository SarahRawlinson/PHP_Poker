<?php namespace App\Classes\Player;


class PlayerCreator
{

    /**
     * @param PlayerType $playerType $
     * @param string $name
     * @return IPerson
     */
    public static function CreatePlayer(PlayerType $playerType, string $name): IPerson
    {
        switch ($playerType) {
            case PlayerType::AI:
            {
                return new AI($name);
            }
            case PlayerType::Human:
            {
                return new Human($name);
            }
            default:
            {
                die("player type not implemented");
            }
        }
    }
}
