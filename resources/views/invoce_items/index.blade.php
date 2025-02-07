@extends('layouts.app')

@section('title', 'Invoice Items')

@section('content')
<h1>Invoice Items</h1>
<a href="{{ route('invoice_items.create') }}">Add Invoice Item</a>
<table>
    <thead>
        <tr>
            <th>Invoice ID</th>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total Price</th>
            <th>Total Price with VAT</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($invoiceItems as $item)
        <tr>
            <td>{{ $item->invoice_id }}</td>
            <td>{{ $item->item_name }}</td> <!-- ✅ Updated -->
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->unit_price }}</td>
            <td>{{ $item->total_price }}</td>
            <td>{{ $item->total_price_with_vat }}</td>
            <td>
                <a href="{{ route('invoice_items.edit', $item->id) }}">Edit</a>
                <form method="POST" action="{{ route('invoice_items.destroy', $item->id) }}" style="display:inline;">
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
