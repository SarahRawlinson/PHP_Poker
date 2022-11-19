@extends('layout')
@section('page name','Edit post')
@section('page title','Edit post')
@section('page content')
    <h2>please update your blog post</h2>
    <form method="POST" action="{{ route('posts.update' , ['post' => $post->id]) }}">
        @csrf
        @method('PUT')
        <label for="title">Title</label><br>
        <label>
            <input type="text" name="title"
                   class="@error('title') error-border @enderror"
                   value="{{old('title')??$post->title}}">
        </label><br>
        @error('title')
        <div class="error">
            {{$message}}
        </div>
        @enderror
        <label for="description">Description</label><br>
        <label>
            <textarea type="text" name="description"
                      class="@error('description') error-border @enderror"
            >{{old('description')??$post->description}}</textarea>
        </label><br>
        @error('description')
        <div class="error">
            {{$message}}
        </div>
        @enderror
        <button type="submit">Update</button>
    </form>
@endsection
