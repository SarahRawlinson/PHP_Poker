<?php
declare(strict_types=1);

namespace Poker\Tests;

use Poker\Classes\Person;
use PHPUnit\Framework\TestCase;

final class Test_Human extends TestCase
{
    public string $name = "name";
    public function GetHuman(): Person\Human
    {
        return new Person\Human($this->name);
    }


    public  function  testHumanHasName(): void
    {
        self:self::assertEquals($this->name, $this->GetHuman()->getName());
    }
}
    
    

