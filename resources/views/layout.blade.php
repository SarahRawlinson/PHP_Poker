<?php

    $PageLinks = [
    ['link' => 'home', 'title' => 'Home'],
    ['link' => 'about', 'title' => 'About'],
    ];
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
    <body class="main">
        <ul class="nav">
            @foreach($PageLinks as $page)
                @if(!request()->routeIs($page['link']))
                    <li><a href="{{ route($page['link']) }}">{{$page['title']}}</a></li>
                @endif
            @endforeach
        </ul>
        <h1>@yield('page title')</h1>
        <h2>@yield('page content')</h2>

    </body>
</html>
