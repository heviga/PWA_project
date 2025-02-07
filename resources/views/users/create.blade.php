@extends('layouts.app')

@section('title', 'Add User')

@section('content')
<h1>Add User</h1>
<form method="POST" action="{{ route('users.store') }}">
    @csrf
    <input type="text" name="first_name" placeholder="First Name" required>
    <input type="text" name="last_name" placeholder="Last Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="text" name="phone" placeholder="Phone">
    <button type="submit">Save</button>
</form>
@endsection
