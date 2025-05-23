@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>You are logged in!</h1>

    <div>
        <input class="modern-input" type="text" name="name" value="{{ old('name', Auth::user()->name) }}" disabled>
        <input class="modern-input" type="email" name="email" value="{{ old('email', Auth::user()->email) }}" disabled>
        <input class="modern-input" type="password" name="password" value="{{ old('password', Auth::user()->password) }}"
            disabled>
    </div>
@endsection