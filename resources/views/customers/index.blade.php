@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Customers List</h1>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('customers.create') }}" class="btn btn-success">Add New Customer</a>
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
                            <th>Name</th>
                            <th>ICO</th>
                            <th>DIC</th>
                            <th>Street</th>
                            <th>City</th>
                            <th>Country</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                            <tr>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->ico_customers }}</td>
                                <td>{{ $customer->dic_customers }}</td>
                                <td>{{ $customer->street }}</td>
                                <td>{{ $customer->city }}</td>
                                <td>{{ $customer->country }}</td>
                                <td>
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form method="POST" action="{{ route('customers.destroy', $customer->id) }}" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this customer?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection