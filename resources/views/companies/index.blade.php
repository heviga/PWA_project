@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Companies</h1>

        <!-- List of Companies -->
        <ul class="list-group mb-4">
            @foreach ($companies as $company)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $company->name }}
                    <span class="badge bg-primary rounded-pill">{{ $company->created_at->format('Y-m-d') }}</span>
                </li>
            @endforeach
        </ul>

        <!-- Add Company Button -->
        <div class="d-flex justify-content-center mb-4">
            @auth
                <!-- If user is logged in -->
                <a href="{{ route('companies.create') }}" class="btn btn-success">Add Company</a>
            @else
                <!-- If user is not logged in -->
                <a href="{{ route('login') }}" class="btn btn-warning">Log in to Add Company</a>
            @endauth
        </div>
    </div>
@endsection
