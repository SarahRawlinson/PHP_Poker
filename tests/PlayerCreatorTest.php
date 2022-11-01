<?php
//use Poker\Classes\Person\PlayerCreator;
//use Poker\Classes\Person\PlayerType;

include_once ("Include.php");



it("check creation", function (string $name, PlayerType $type)
{
    $this->assertSame(PlayerCreator::CreatePlayer($type, $name)->getName(), $name);
})->with([
    ["bob", PlayerType::AI],
    ["bob", PlayerType::Human]
]);

