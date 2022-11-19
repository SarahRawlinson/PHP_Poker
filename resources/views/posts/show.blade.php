
@extends('layout')
@section('page name',$post->id)
@section('page title',$post->id)
@section('page content')
    <h2>Post number #{{ $post->id }}</h2>
        <div class="post-content">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->description }}</p>
        </div>
@endsection
