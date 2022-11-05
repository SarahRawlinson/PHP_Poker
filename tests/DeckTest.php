<?php
include_once ("Include.php");

test('check Deck throws exception when give non-card object', function () {
    $deck = new Deck();
    $deck->append(0);
})->throws(Exception::class);