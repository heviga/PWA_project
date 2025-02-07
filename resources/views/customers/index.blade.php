@extends('layouts.app')

@section('title', 'Customers')

@section('content')
<h1>Customers</h1>
<a href="{{ route('customers.create') }}">Add New Customer</a>
<table>
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
                <a href="{{ route('customers.edit', $customer->id) }}">Edit</a>
                <form method="POST" action="{{ route('customers.destroy', $customer->id) }}" style="display:inline;">
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
