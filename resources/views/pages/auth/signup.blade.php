@extends('layout.main')
@section('title')Signup @endsection
@section('navigation')
    <a href="{{ route('login') }}" class="nav-btn nav-btn--close">
        @svg('img/close.svg')
    </a>

    <h3 class="nav-title">Sign up</h3>
@endsection

@section('content')
    <form action="{{ route('signup') }}" method="post" enctype="multipart/form-data" autocomplete="off" spellcheck="false" class="signup-form mt-auto">
        @csrf

        <div class="flex justify-center mb-8">
            <div class="avatar">
                <div class="btn btn-bubble btn-green">
                    <input type="file" name="avatar">
                    +
                </div>
            </div>
        </div>

        <div class="form-input mb-5">
            <label for="name">Full name:</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-input mb-5">
            <label for="email">Email:</label>
            <input type="text" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-input mb-5">
            <label for="password">Password:</label>
            <input type="password" name="password">
        </div>

        <div class="form-input mb-5">
            <label for="birthday">Birthday:</label>
            <input type="text" name="birthday" value="{{ old('birthday') }}">
        </div>

        @component('components.form.errors',[
           'errors' => $errors
        ])@endcomponent

        <button class="btn btn-green btn-block mt-5">Create</button>
    </form>

    <div class="text-center">
        <p class="inline-block uppercase text-gray-500 tracking-wide">Already have an account?</p>
        <a href="{{ route('login') }}" class="uppercase ml-2 linked whitespace-no-wrap">Sing in</a>
    </div>
@endsection
