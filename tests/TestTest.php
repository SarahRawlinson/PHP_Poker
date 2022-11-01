<?php
include_once ("Include.php");

it('checks if the number is even', function ($number, $isEven) {
    $this->assertSame($isEven, Number::isEven($number));
})->with([
    [1, false],
    [2, true],
    [10, true],
    [21, false],
]);