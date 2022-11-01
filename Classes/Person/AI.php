<?php

//namespace Poker\Classes\Person;
class AI implements IPerson
{
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}