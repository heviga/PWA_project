@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Add Invoice</h1>

    <div class="card shadow p-4">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('invoices.store') }}">
            @csrf

            <div class="mb-3">
                <label for="company_id" class="form-label">Select Company</label>
                <select class="form-control" id="company_id" name="company_id" required {{ isset($selectedCompany) ? 'disabled' : '' }}>
                    @if(isset($selectedCompany))
                        <option value="{{ $selectedCompany->id }}" selected>{{ $selectedCompany->name }}</option>
                    @else
                        <option value="">Select Company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    @endif
                </select>
                @if(isset($selectedCompany))
                    <input type="hidden" name="company_id" value="{{ $selectedCompany->id }}">
                @endif
            </div>

            <div class="mb-3">
                <label for="customer_id" class="form-label">Select Customer</label>
                <select class="form-control" id="customer_id" name="customer_id" required>
                    <option value="">Select Customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="total_amount" class="form-label">Total Amount</label>
                <input type="number" class="form-control" id="total_amount" name="total_amount" placeholder="Total Amount" required>
            </div>

            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method</label>
                <select class="form-control" id="payment_method" name="payment_method" required>
                    <option value="prevodom">Prevodom</option>
                    <option value="kartou">Kartou</option>
                    <option value="hotovost">Hotovosť</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="issue_date" class="form-label">Issue Date</label>
                <input type="date" class="form-control" id="issue_date" name="issue_date" required>
            </div>

            <div class="mb-3">
                <label for="due_date" class="form-label">Due Date</label>
                <input type="date" class="form-control" id="due_date" name="due_date" required>
            </div>

            <div class="mb-3">
                <label for="delivery_date" class="form-label">Delivery Date</label>
                <input type="date" class="form-control" id="delivery_date" name="delivery_date" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Invoice</button>
        </form>
    </div>
</div>
@endsection