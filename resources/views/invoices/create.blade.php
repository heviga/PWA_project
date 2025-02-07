@extends('layouts.app')

@section('title', 'Add Invoice')

@section('content')
<h1>Add Invoice</h1>
<form method="POST" action="{{ route('invoices.store') }}">
    @csrf
    <select name="company_id" required>
        <option value="">Select Company</option>
        @foreach ($companies as $company)
        <option value="{{ $company->id }}">{{ $company->name }}</option>
        @endforeach
    </select>
    <select name="customer_id" required>
        <option value="">Select Customer</option>
        @foreach ($customers as $customer)
        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
        @endforeach
    </select>
    <input type="number" name="total_amount" placeholder="Total Amount" required>
    <select name="payment_method">
        <option value="prevodom">Prevodom</option>
        <option value="kartou">Kartou</option>
        <option value="hotovost">Hotovost</option>
    </select>
    <input type="date" name="issue_date" required>
    <input type="date" name="due_date" required>
    <input type="date" name="delivery_date" required>
    <button type="submit">Save</button>
</form>
@endsection
