<?php

interface ICard
{
    public function getValue(): int;
    public function getName(): string;
    public function getImage(): string;
}