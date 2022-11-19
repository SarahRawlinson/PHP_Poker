<?php
use App\Classes\Cards\CardExamples;
use App\Classes\Cards\Card\ICard;
$cards = CardExamples::getRoyalFlush();
?>
@extends('layout')
@section('page name','Poker Home')
@section('page title','Poker Home')
@section('page content')
    <h2>welcome to my Poker Home page</h2>
    @forelse($cards as $card)
    @if(is_a($card, ICard::class))
        <img src="{{asset($card->getImagePath())}}" alt="{{$card->getName()}}">
    @endif
    @empty
        <p>There are no cards</p>
    @endforelse
@endsection

