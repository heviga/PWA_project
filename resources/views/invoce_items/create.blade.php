@extends('layouts.app')

@section('title', 'Add Invoice Item')

@section('content')
<h1>Add Invoice Item</h1>
<form method="POST" action="{{ route('invoice_items.store') }}">
    @csrf
    <select name="invoice_id" required>
        <option value="">Select Invoice</option>
        @foreach ($invoices as $invoice)
        <option value="{{ $invoice->id }}">Invoice #{{ $invoice->id }}</option>
        @endforeach
    </select>
    <input type="text" name="item_name" placeholder="Item Name" required>
    <input type="number" name="quantity" placeholder="Quantity" required>
    <input type="number" step="0.01" name="unit_price" placeholder="Unit Price" required>
    <button type="submit">Save</button>
</form>
@endsection
