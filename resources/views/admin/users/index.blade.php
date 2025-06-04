@extends('layouts.admin')

@section('title', 'Users')

@section('content')
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Is admin(1)</th>
                <th>Acties</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin}}</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="{{ route('admin.users.edit', $user) }}">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit"
                                onclick="return confirm('Are u sure u want to delete this account!')">Delete</button>
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