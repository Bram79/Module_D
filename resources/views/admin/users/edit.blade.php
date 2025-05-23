@extends('layouts.app')

@section('content')
    <form class="modern-form" method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PATCH')
        <h1>Gebruiker bewerken</h1>
        <div>
            <input class="modern-input" type="text" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input class="modern-input" type="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        <a href="{{ route('admin.users.index') }}">← Terug naar gebruikerslijst</a>
        <button class="modern-button" type="submit">Opslaan</button>
    </form>
@endsection