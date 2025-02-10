@extends('layouts.app')

@section('title', 'Companies')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Companies List</h1>

        <!-- Add Company Button -->
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
                                    <!-- Edit Button -->
                                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                    <!-- Delete Form -->
                                    <form method="POST" action="{{ route('companies.destroy', $company->id) }}" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this company?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>

                                    <!-- Detail Button (opens modal) -->
                                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#companyModal{{ $company->id }}">Detail</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal for displaying company details -->
    @foreach ($companies as $company)
        <div class="modal fade" id="companyModal{{ $company->id }}" tabindex="-1" aria-labelledby="companyModalLabel{{ $company->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="companyModalLabel{{ $company->id }}">{{ $company->name }} Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Type:</strong> {{ $company->type }}</p>
                        <p><strong>ICO:</strong> {{ $company->ico_companies }}</p>
                        <p><strong>DIC:</strong> {{ $company->dic_companies }}</p>
                        <p><strong>Email:</strong> {{ $company->email }}</p>
                        <p><strong>Bank Name:</strong> {{ $company->bank_name }}</p>
                        <p><strong>SWIFT:</strong> {{ $company->swift }}</p>
                        <p><strong>IBAN:</strong> {{ $company->iban }}</p>
                        <p><strong>Account Number:</strong> {{ $company->account_number }}</p>
                        <p><strong>Bank Code:</strong> {{ $company->bank_code }}</p>
                        <p><strong>Street:</strong> {{ $company->street }}</p>
                        <p><strong>Postal Code:</strong> {{ $company->postal_code }}</p>
                        <p><strong>City:</strong> {{ $company->city }}</p>
                        <p><strong>Country:</strong> {{ $company->country }}</p>
                        <p><strong>Phone:</strong> {{ $company->phone ?? 'N/A' }}</p>
                        <p><strong>Created At:</strong> {{ $company->created_at->format('Y-m-d') }}</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit</a>
                        <form method="POST" action="{{ route('companies.destroy', $company->id) }}" onsubmit="return confirm('Are you sure you want to delete this company?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection