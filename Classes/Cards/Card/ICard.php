<?php

interface ICard
{
    public function getValue(): int;
    public function getName(): string;
    public function getImage(): string;
    public function getImagePath(): string;
}