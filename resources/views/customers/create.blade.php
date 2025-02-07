@extends('layouts.app')

@section('title', 'Add Customer')

@section('content')
<h1>Add Customer</h1>
<form method="POST" action="{{ route('customers.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Customer Name" required>
    <input type="text" name="ico_customers" placeholder="ICO">
    <input type="text" name="dic_customers" placeholder="DIC">
    <input type="text" name="street" placeholder="Street">
    <input type="text" name="postal_code" placeholder="Postal Code">
    <input type="text" name="city" placeholder="City">
    <input type="text" name="country" placeholder="Country">
    <button type="submit">Save</button>
</form>
@endsection
