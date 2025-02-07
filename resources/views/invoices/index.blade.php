@extends('layouts.app')

@section('title', 'Invoices')

@section('content')
<h1>Invoices</h1>
<a href="{{ route('invoices.create') }}">Add New Invoice</a>
<table>
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
                <a href="{{ route('invoices.edit', $invoice->id) }}">Edit</a>
                <form method="POST" action="{{ route('invoices.destroy', $invoice->id) }}" style="display:inline;">
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
