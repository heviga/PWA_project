@extends('layouts.app')

@section('title', 'Edit Invoice')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Edit Invoice</h1>

        <div class="card shadow p-4">
            <form method="POST" action="{{ route('invoices.update', $invoice->id) }}">
                @csrf
                @method('PUT')

                <!-- Company -->
                <div class="mb-3">
                    <label for="company_id" class="form-label">Company</label>
                    <select class="form-control" id="company_id" name="company_id" required>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" {{ $company->id == $invoice->company_id ? 'selected' : '' }}>
                                {{ $company->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Customer -->
                <div class="mb-3">
                    <label for="customer_id" class="form-label">Customer</label>
                    <select class="form-control" id="customer_id" name="customer_id" required>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}" {{ $customer->id == $invoice->customer_id ? 'selected' : '' }}>
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Total Amount -->
                <div class="mb-3">
                    <label for="total_amount" class="form-label">Total Amount</label>
                    <input type="number" class="form-control" id="total_amount" name="total_amount" value="{{ old('total_amount', $invoice->total_amount) }}" required>
                </div>

                <!-- Payment Method -->
                <div class="mb-3">
                    <label for="payment_method" class="form-label">Payment Method</label>
                    <select class="form-control" id="payment_method" name="payment_method" required>
                        <option value="prevodom" {{ $invoice->payment_method == 'prevodom' ? 'selected' : '' }}>Prevodom</option>
                        <option value="kartou" {{ $invoice->payment_method == 'kartou' ? 'selected' : '' }}>Kartou</option>
                        <option value="hotovost" {{ $invoice->payment_method == 'hotovost' ? 'selected' : '' }}>Hotovosť</option>
                    </select>
                </div>

                <!-- Issue Date -->
                <div class="mb-3">
                    <label for="issue_date" class="form-label">Issue Date</label>
                    <input type="date" class="form-control" id="issue_date" name="issue_date" value="{{ old('issue_date', $invoice->issue_date->format('Y-m-d')) }}" required>
                </div>

                <!-- Due Date -->
                <div class="mb-3">
                    <label for="due_date" class="form-label">Due Date</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" value="{{ old('due_date', $invoice->due_date->format('Y-m-d')) }}" required>
                </div>

                <!-- Delivery Date -->
                <div class="mb-3">
                    <label for="delivery_date" class="form-label">Delivery Date</label>
                    <input type="date" class="form-control" id="delivery_date" name="delivery_date" value="{{ old('delivery_date', $invoice->delivery_date->format('Y-m-d')) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Invoice</button>
            </form>
        </div>
    </div>
@endsection