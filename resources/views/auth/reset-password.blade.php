@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
    <h1>Reset Password</h1>

    @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="modern-form" method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ request()->route('token') }}">

        <input type="email" name="email" placeholder="Email" value="{{ old('email', request()->email) }}" required autofocus
            class="modern-input">

        <input type="password" name="password" placeholder="New Password" required class="modern-input">

        <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="modern-input">

        <button type="submit" class="modern-button">Reset Password</button>
    </form>
@endsection