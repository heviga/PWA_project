@extends('layouts.app')

@section('title', 'Invoices')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Invoices by Company</h1>

        @foreach ($companies as $company)
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4>{{ $company->name }}</h4>

                    <!-- Button to Add New Invoice -->
                    <a href="{{ route('invoices.create', ['company_id' => $company->id]) }}" class="btn btn-success mb-3">
                        Add New Invoice
                    </a>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Invoice No.</th>
                                <th>Customer</th>
                                <th>Total Amount [$]</th>
                                <th>Issue Date</th>
                                <th>Due Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($company->invoices as $invoice)
                                <tr>
                                    <td>{{ $invoice->invoice_number }}</td>
                                    <td>{{ $invoice->customer->name }}</td>
                                    <td>{{ $invoice->total_amount }}</td>
                                    <td>{{ $invoice->issue_date }}</td>
                                    <td>{{ $invoice->due_date }}</td>
                                    <td>
                                        <!-- Edit Invoice -->
                                        <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                        <!-- Delete Invoice -->
                                        <form method="POST" action="{{ route('invoices.delete', $invoice->id) }}" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this invoice?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                        <!-- Generate PDF -->
                                        <a href="{{ route('invoices.pdf', $invoice->id) }}" class="btn btn-sm btn-info">Download PDF</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@endsection