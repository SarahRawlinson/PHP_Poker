﻿<?php
//https://pestphp.com/docs/expectations#expect-toBeCallable

//use App\Classes\Player\IPerson;
//use App\Classes\Player\PlayerCreator;

include_once("Include.php");

$players =
    [["bob", PlayerType::AI],
    ["bob", PlayerType::Human]];


test("check creation", function ($name, $type)
{
    $this->assertSame(PlayerCreator::CreatePlayer($type, $name)->getName(), $name);
})->with($players);


test("check players instance of IPerson", function ($name, $type)
{
    expect(PlayerCreator::CreatePlayer($type, $name))->toBeInstanceOf(IPerson::class);
})->with($players);


test("check name is string", function ($name, $type)
{
    expect(PlayerCreator::CreatePlayer($type, $name)->getName())->toBeString();
})->with($players);
