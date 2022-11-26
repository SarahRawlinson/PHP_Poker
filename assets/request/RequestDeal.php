<?php
include_once ('..\..\Include.php');
$sent = $_REQUEST['num'];
$dealer = new StandardPlayingCardDealer();
$dealer->shuffleCards();
$cards = $dealer->popCards($sent);
$array = [];
foreach ($cards as $i=>$card)
{
    $array["v".$i] = [ 'image'=>$card->getImagePath(), 'name'=>$card->getName()];
}
echo json_encode(['log' => $array, 'dealer_count' => $dealer->getDeck()->count()]);