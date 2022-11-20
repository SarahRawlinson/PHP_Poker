<?php

use Illuminate\Support\Facades\Auth;

$PageLinks = [
    ['link' => 'home', 'title' => 'Home', 'login_needed' => 0],
    ['link' => 'about', 'title' => 'About', 'login_needed' => 0],
    ['link' => 'posts.create', 'title' => 'Create Post', 'login_needed' => 1],
    ['link' => 'poker.create', 'title' => 'Poker', 'login_needed' => 0],
    ['link' => 'login', 'title' => 'Login', 'login_needed' => -1],
    ['link' => 'register', 'title' => 'Register', 'login_needed' => -1],
    ['link' => 'logout', 'title' => 'Logout', 'login_needed' => 1]
];
$loggedIn = false;
?>



@auth
    <?php $loggedIn = true ?>
@endauth

{{--status--}}
@if($loggedIn)
    <div class="container">
        <div class="row">
            <h5 class="text-end">You are logged in as {{Auth::user()->name}}</h5>
        </div>
    </div>
@endif

<div class="container-fluid">
    <div class="row pb-3 pt-3 mb-3 mt-3">

        {{--nav bar--}}
        <ul class="nav">
            @foreach($PageLinks as $page)
                @if(($page['login_needed'] === 1 && $loggedIn)
                    || $page['login_needed'] === 0
                    || ($page['login_needed'] === -1 && !$loggedIn))
                    <li><a href="{{ route($page['link']) }}"
                           class={{request()->routeIs($page['link'])?"active":""}}>{{$page['title']}}</a></li>
                @endif
            @endforeach
        </ul>

        {{--messages--}}
        <div class="mb-5">
            @includeWhen($errors->any(), 'messages._errors')
            @includeWhen(session('success'), 'messages._success')
            @includeWhen(session('deleted'), 'messages._item_deleted')
        </div>
    </div>
</div>
