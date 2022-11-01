<?php
//use Poker\Classes\Person\PlayerCreator;
//use Poker\Classes\Person\PlayerType;
//https://pestphp.com/docs/expectations#expect-toBeCallable

include_once ("Include.php");

$objects = 
    [["bob", PlayerType::AI],
    ["bob", PlayerType::Human]];


test("check creation", function ($name, $type)
{
    $this->assertSame(PlayerCreator::CreatePlayer($type, $name)->getName(), $name);
})->with($objects);


test("check players instance of IPerson", function ($name, $type)
{
    expect(PlayerCreator::CreatePlayer($type, $name))->toBeInstanceOf(IPerson::class);
})->with($objects);


test("check name is string", function ($name, $type)
{
    expect(PlayerCreator::CreatePlayer($type, $name)->getName())->toBeString();
})->with($objects);