@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Add User</h1>
    <form method="POST" action="{{ route('users.store') }}" class="card p-4 shadow-sm">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" id="first_name" name="first_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" id="last_name" name="last_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success w-100">Create User</button>
    </form>
</div>
@endsection
