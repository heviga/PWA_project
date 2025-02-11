@extends('layouts.app')

@section('title', 'Companies')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Companies List</h1>

        <div class="d-flex justify-content-end mb-3">
            @auth
                <a href="{{ route('companies.create') }}" class="btn btn-success">Add New Company</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-warning">Log in to Add Company</a>
            @endauth
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Company Name</th>
                            <th>Type</th>
                            <th>ICO</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td>{{ strtoupper($company->type) }}</td>
                                <td>{{ $company->ico_companies }}</td>
                                <td>{{ $company->email }}</td>
                                <td>
                                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                    <form method="POST" action="{{ route('companies.destroy', $company->id) }}" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this company?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>

                                    <!-- Generate PDF -->
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection