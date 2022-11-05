<?php

interface ICard
{
    public function getValue(IHand $hand): int;
    public function getName(): string;
    public function getImage(): string;
}