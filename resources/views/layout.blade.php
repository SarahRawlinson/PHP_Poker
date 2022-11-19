<?php

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

    <!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page name')</title>
    <!-- Fonts -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
</head>

{{--body--}}
<body class="main">

@auth
    <?php $loggedIn = true ?>
@endauth


{{--nav--}}
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
@includeWhen($errors->any(), 'messages._errors')
@includeWhen(session('success'), 'messages._success')
@includeWhen(session('deleted'), 'messages._item_deleted')

{{--title--}}
<h1>@yield('page title')</h1>

{{--content--}}
@yield('page content')

</body>
</html>
