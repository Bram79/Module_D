@extends('layouts.admin')

@section('content')
    <form class="modern-form" method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PATCH')
        <h1>user edit</h1>
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

        <div>
            <b><label for="is_admin">Options: 1 is admin 0 is not</label></b>
            <input class="modern-input" type="number" name="is_admin" value="{{ old('is_admin', $user->is_admin) }}"
                required min="0" max="1">
            @error('is_admin')
                <div style="color:red">{{ $message }}</div>
            @enderror
        </div>
        <a href="{{ route('admin.users.index') }}">← back to list</a>
        <button class="modern-button" type="submit">save</button>
    </form>
@endsection