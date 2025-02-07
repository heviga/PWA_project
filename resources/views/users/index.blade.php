@extends('layouts.app')

@section('title', 'Users')

@section('content')
<h1>Users</h1>
<a href="{{ route('users.create') }}">Add New User</a>
<table>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>
                <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                <form method="POST" action="{{ route('users.destroy', $user->id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
