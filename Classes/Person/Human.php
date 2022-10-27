<?php declare(strict_types=1);

namespace Poker\Classes\Person;
class Human implements IPerson
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