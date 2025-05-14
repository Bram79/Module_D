@extends('layouts.app')

@section('title', 'signin')

@section('content')
    <div class="signBox">
        <h1>Sign In </h1>
        <form action="{{ route('signin') }}" method="POST">
            @csrf
            <input type="text" placeholder="enter: Email/username" class="formInput">
            <input type="password" placeholder="enter: Password" class="formInput">
            <button type="submit" class="formButton">Sign in</button>
        </form>
    </div>
@endsection