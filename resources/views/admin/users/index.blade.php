@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <table>
        <thead>
            <tr>
                <th>Naam</th>
                <th>Email</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="{{ route('admin.users.edit', $user) }}">Bewerk</a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit"
                                onclick="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?')">Verwijder</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div class="table-links">
        {{ $users->links() }}
    </div>



@endsection