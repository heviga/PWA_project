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
                    <input type="date" class="form-control" id="issue_date" name="issue_date" value="{{ old('issue_date', \Carbon\Carbon::parse($invoice->issue_date)->format('Y-m-d')) }}" required>
                </div>

                <!-- Due Date -->
                <div class="mb-3">
                    <label for="due_date" class="form-label">Due Date</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" value="{{ old('due_date', \Carbon\Carbon::parse($invoice->due_date)->format('Y-m-d')) }}" required>
                </div>

                <!-- Delivery Date -->
                <div class="mb-3">
                    <label for="delivery_date" class="form-label">Delivery Date</label>
                    <input type="date" class="form-control" id="delivery_date" name="delivery_date" value="{{ old('delivery_date', \Carbon\Carbon::parse($invoice->delivery_date)->format('Y-m-d')) }}" required>
                </div>

                <hr>

                <!-- Položky faktúry -->
                <h4>Invoice Items</h4>
                <div id="invoice-items-container">
                    @foreach ($invoice->invoiceItems as $index => $item)
                        <div class="invoice-item mb-3">
                            <input type="text" name="invoice_items[{{ $index }}][item_name]" class="form-control mb-2" placeholder="Item Name" value="{{ old("invoice_items.{$index}.item_name", $item->item_name) }}" required>
                            <input type="number" name="invoice_items[{{ $index }}][quantity]" class="form-control mb-2" placeholder="Quantity" value="{{ old("invoice_items.{$index}.quantity", $item->quantity) }}" required>
                            <input type="number" name="invoice_items[{{ $index }}][unit_price]" class="form-control" placeholder="Unit Price" step="0.01" value="{{ old("invoice_items.{$index}.unit_price", $item->unit_price) }}" required>
                        </div>
                    @endforeach
                </div>

                <button type="button" id="add-item-btn" class="btn btn-secondary mt-2">Add Item</button>

                <hr>
                <button type="submit" class="btn btn-primary mt-3">Update Invoice</button>
            </form>
        </div>
    </div>

    <script>
        let itemCount = {{ $invoice->invoiceItems->count() }};
        const maxItems = 5;

        document.getElementById('add-item-btn').addEventListener('click', function () {
            if (itemCount >= maxItems) {
                alert('You can only add up to 5 items.');
                return;
            }

            const container = document.getElementById('invoice-items-container');
            const newItem = document.createElement('div');
            newItem.classList.add('invoice-item', 'mb-3');

            newItem.innerHTML = `
                <input type="text" name="invoice_items[${itemCount}][item_name]" class="form-control mb-2" placeholder="Item Name" required>
                <input type="number" name="invoice_items[${itemCount}][quantity]" class="form-control mb-2" placeholder="Quantity" required>
                <input type="number" name="invoice_items[${itemCount}][unit_price]" class="form-control" placeholder="Unit Price" step="0.01" required>
            `;

            container.appendChild(newItem);
            itemCount++;
        });
    </script>
@endsection