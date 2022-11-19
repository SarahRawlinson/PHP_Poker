﻿
@extends('layout')
@section('page name','Home')
@section('page title','Home')
@section('page content')
    <h2>welcome to my Home page</h2>
    @forelse($posts as $post)
        <div class="post-content">
            <h2>
                @auth
                    <a href="{{route('posts.show', [$post])}}">
                        @endauth
                        {{ $post->title }}
                        @auth
                    </a>
                @endauth

            </h2>
            <p>{{ $post->description }}</p>
        </div>
    @empty
        <p>There are no posts yet</p>
    @endforelse
@endsection
