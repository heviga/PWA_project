@extends('layouts.app')

@section('title', 'Invoices')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Invoices List</h1>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('invoices.create') }}" class="btn btn-success">Add New Invoice</a>
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
                            <th>Company</th>
                            <th>Customer</th>
                            <th>Total Amount</th>
                            <th>Payment Method</th>
                            <th>Issue Date</th>
                            <th>Due Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->company->name }}</td>
                                <td>{{ $invoice->customer->name }}</td>
                                <td>{{ $invoice->total_amount }}</td>
                                <td>{{ $invoice->payment_method }}</td>
                                <td>{{ $invoice->issue_date }}</td>
                                <td>{{ $invoice->due_date }}</td>
                                <td>
                                    <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    
                                    <!-- Soft Delete -->
                                    <form method="POST" action="{{ route('invoices.delete', $invoice->id) }}" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this invoice?')">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>

                                    <!-- Force Delete -->
                                    <form method="POST" action="{{ route('invoices.forceDelete', $invoice->id) }}" style="display:inline;" onsubmit="return confirm('Are you sure you want to permanently delete this invoice?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Force Delete</button>
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