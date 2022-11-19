@extends('layout')

@section('page name', 'Login')
@section('page title', 'Login')

@section('page content')
    <h2>Please enter your username and password</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

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

        <button type="submit">Login</button>
    </form>
@endsection
