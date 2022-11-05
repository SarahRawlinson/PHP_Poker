<?php

interface ICard
{
    public function getValue(array $hand): int;
    public function getName(): string;
}