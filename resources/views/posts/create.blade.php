@extends('layout')
@section('page name','Create new post')
@section('page title','Create new post')
@section('page content')
    <h2>please create your new blog post</h2>
    <form method="Post" action="{{ route('posts.store') }}">
        @csrf
        <label for="title">Title</label><br>
        <label>
            <input type="text" name="title" placeholder="The name of your blog..."
                    class="@error('title') error-border @enderror"
                    value="{{old('title')}}">
        </label><br>
        @error('title')
        <div class="error">
            {{$message}}
        </div>
        @enderror
        <label for="description">Description</label><br>
        <label>
            <textarea type="text" name="description" placeholder="Enter your content..."
                      class="@error('description') error-border @enderror"
            >{{old('description')}}</textarea>
        </label><br>
        @error('description')
        <div class="error">
            {{$message}}
        </div>
        @enderror
    <button type="submit">Submit</button>
    </form>
@endsection
