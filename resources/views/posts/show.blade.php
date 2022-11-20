<?php
$id = $post->id ?? null;
$title = $post->title ?? null;
$description = $post->description ?? null;
if ($id == null || $title == null || $description == null) {
    die();
}
?>

@extends('layout')
@section('page name',$id)
@section('page title',$id)
@section('page content')
    <h2>Post number #{{ $id }}</h2>
    <div class="post-content">
        <h2>{{ $title }}</h2>
        <p>{{ $description }}</p>
        @can('update',$post)
        <a href="{{route('posts.edit', [$post])}}">Edit Post</a>
        @endcan
        @can('delete', $post)
        <form method="POST" action="{{route('posts.destroy',[$post])}}">
            @csrf
            @method('DELETE')
            <button class="delete" type="submit">Delete Post</button>
        </form>
        @endcan
    </div>
@endsection
