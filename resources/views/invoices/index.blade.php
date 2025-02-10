@extends('layouts.app')

@section('title', 'Invoices')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Invoices</h1>
        
        <a href="{{ route('invoices.create') }}" class="btn btn-success mb-3">Add New Invoice</a>

        <!-- List of Invoices -->
        <table class="table table-bordered">
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
                            <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            
                            <!-- Soft Delete -->
                            <form method="POST" action="{{ route('invoices.delete', $invoice->id) }}" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>

                            <!-- Force Delete -->
                            <form method="POST" action="{{ route('invoices.forceDelete', $invoice->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Force Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection