@extends('layout.main')
@section('title')Login @endsection
@section('content')
    <a class="logo" href="{{ route('home') }}">
        <img src="{{ asset('img/logo.png') }}" alt="{{ config('app.name') }}">
    </a>

    <form action="{{ route('login') }}" method="post" autocomplete="off" spellcheck="false" class="login-form">
        @csrf
        <div class="form-input mb-5">
            <label for="email">Email:</label>
            <input type="text" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-input">
            <label for="password">Password:</label>
            <input type="password" name="password">
            <a href="{{ route('login') }}" class="forgot-password text-gray-500 text-sm">Forgot password</a>
        </div>

        @component('components.form.errors',[
         'errors' => $errors
        ])@endcomponent

        <button class="btn btn-green btn-block mt-12">Login</button>
    </form>

    <div class="mt-5 text-center">
        <p class="inline-block uppercase text-gray-500 tracking-wide">Dont have an account?</p>
        <a href="{{ route('signup') }}" class="uppercase ml-2 linked whitespace-no-wrap">Sing up</a>
    </div>
@endsection
