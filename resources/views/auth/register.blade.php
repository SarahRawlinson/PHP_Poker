@extends('layout')

@section('page name', 'Register')
@section('page title', 'Register')

@section('page content')
    <h2>Register you account using the form</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row">
            <label for="name">Name</label>
        </div>
        <div class="row d-inline-flex p-2 ms-5">
            <label>
                <input class="@error('name') error-border @enderror" type="text" name="name" value="{{ old('name') }}">
            </label>
        </div>
        @error('name')
            <div class="row">
                <div class="error">
                    {{ $message }}
                </div>
            </div>
        @enderror

        <div class="row">
        <label for="email">Email</label>
        </div>
        <div class="row d-inline-flex p-2 ms-5">
        <label>
            <input class="@error('email') error-border @enderror" type="text" name="email" value="{{ old('email') }}">
        </label>
        </div>
        @error('email')
            <div class="row">
                <div class="error">
                    {{ $message }}
                </div>
            </div>
        @enderror

        <div class="row">
        <label for="password">Password</label>
        </div>
        <div class="row d-inline-flex p-3 ms-5">
        <label>
            <input class="@error('password') error-border @enderror" type="password" name="password">
        </label>
        </div>
        @error('password')
            <div class="row">
                <div class="error">
                    {{ $message }}
                </div>
            </div>
        @enderror
        <br>
        <div class="d-flex flex-row-reverse me-5">
        <button type="submit">Register</button>
        </div>

        <div class="row">
        <h4>If you already have an account <a href="{{ route('login') }}">login</a>.</h4>
        </div>
    </form>
@endsection
