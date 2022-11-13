<?php

use App\Classes\Cards\Dealer\StandardPlayingCardDealer;

include_once ('..\..\Include.php');
$sent = $_REQUEST['num'];
$b = false;
if (!isset($_SERVER['dealer']))
{
    $b = true;
    $_SERVER['dealer'] = new StandardPlayingCardDealer();
}


$dealer = $_SERVER['dealer'];
$dealer->shuffleCards();
$cards = $dealer->popCards($sent);
$array = [];
foreach ($cards as $i=>$card)
{
    $array["v".$i] = [ 'image'=>$card->getImagePath(), 'name'=>$card->getName()];
}
echo json_encode(['log' => $array, 'dealer_count' => $b]);
