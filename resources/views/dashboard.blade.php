@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <h1>Profile and security</h1>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div class="modern-dashboard">
            <div class="dashboard-box">
                <b><label>Name:</label></b>
                <input class="modern-input" type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required>
            </div>

            <div class="dashboard-box">
                <b><label>E-mail:</label></b>
                <input class="modern-input" type="email" name="email" value="{{ old('email', Auth::user()->email) }}"
                    required>
            </div>

            <div class="dashboard-box">
                <b><label>Wachtwoord wijzigen:</label></b>
                <input type="password" name="current_password" placeholder="Current password" class="modern-input">
                <input type="password" name="password" placeholder="New password" class="modern-input">
                <input type="password" name="password_confirmation" placeholder="Confirm new password" class="modern-input">
            </div>

            <div class="dashboard-box">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </div>
    </form>
@endsection