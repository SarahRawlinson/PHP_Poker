<?php

    $PageLinks = [
    ['link' => 'home', 'title' => 'Home'],
    ['link' => 'about', 'title' => 'About'],
    ['link' => 'posts.create', 'title' => 'Blog'],
    ['link' => 'poker.create', 'title' => 'Poker']
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
        <li><a href="{{ route($page['link']) }}"
               class={{request()->routeIs($page['link'])?"active":""}}>{{$page['title']}}</a></li>
    @endforeach
</ul>
@includeWhen($errors->any(), 'messages._errors')
@includeWhen(session('success'), 'messages._success')
@includeWhen(session('deleted'), 'messages._item_deleted')
<h1>@yield('page title')</h1>
@yield('page content')

</body>
</html>
