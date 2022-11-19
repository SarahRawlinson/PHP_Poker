@extends('layout')

@section('page name', 'Register')
@section('page title', 'Register')

@section('page content')
    <h2>Register you account using the form</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label for="name">Name</label>
        <label>
            <input class="@error('name') error-border @enderror" type="text" name="name" value="{{ old('name') }}">
        </label>
        @error('name')
        <div class="error">
            {{ $message }}
        </div>
        @enderror

        <label for="email">Email</label>
        <label>
            <input class="@error('email') error-border @enderror" type="text" name="email" value="{{ old('email') }}">
        </label>
        @error('email')
        <div class="error">
            {{ $message }}
        </div>
        @enderror

        <label for="password">Password</label>
        <label>
            <input class="@error('password') error-border @enderror" type="password" name="password">
        </label>
        @error('password')
        <div class="error">
            {{ $message }}
        </div>
        @enderror

        <button type="submit">Register</button>
        <br>

        <h4>If you already have an account <a href="{{ route('login') }}">login</a>.</h4>
    </form>
@endsection
