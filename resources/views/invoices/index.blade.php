@extends('layouts.app')

@section('title', 'Invoices')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Invoices by Company</h1>
<!-- viditelne pre vsetkych -->
        <div class="d-flex justify-content-end mb-3">
        @if(auth()->check()) 
            <a href="{{ route('invoices.create') }}" class="btn btn-success">Create New Invoice</a>
        @else
        <a href="{{ route('login') }}" class="btn btn-secondary">Log in to Create Invoice</a>
        @endif
    </div>

        @foreach ($companies as $company)
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h4>{{ $company->name }}</h4>

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
                                <tr class="clickable-row" data-invoice-id="{{ $invoice->id }}">
                                    <td>{{ $invoice->id }}</td>
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
                                        <a href="{{ route('invoices.pdf', $invoice->id) }}" class="btn btn-sm btn-secondary">PDF</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
    <div class="text-center mt-4">
    <a href="{{ route('invoices.downloadZip') }}" class="btn btn-lg btn-info">
        Download All Invoices (Last Year)
    </a>
<!-- </div> -->


    <!-- Modal for Invoice Details -->
    <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="invoiceModalLabel">Invoice Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Invoice No:</strong> <span id="modalInvoiceNumber"></span></p>
                    <p><strong>Customer:</strong> <span id="modalCustomerName"></span></p>
                    <p><strong>Total Amount:</strong> $<span id="modalTotalAmount"></span></p>
                    <p><strong>Issue Date:</strong> <span id="modalIssueDate"></span></p>
                    <p><strong>Due Date:</strong> <span id="modalDueDate"></span></p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.clickable-row').forEach(function (row) {
                row.addEventListener('click', function () {
                    const invoiceId = this.dataset.invoiceId;
                    
                    // Fetch the invoice details
                    fetch(`/invoices/${invoiceId}`)
                        .then(response => response.json())
                        .then(data => {
                            // Populate modal with data
                            document.getElementById('modalInvoiceNumber').textContent = data.id;
                            document.getElementById('modalCustomerName').textContent = data.customer.name;
                            document.getElementById('modalTotalAmount').textContent = data.total_amount;
                            document.getElementById('modalIssueDate').textContent = data.issue_date;
                            document.getElementById('modalDueDate').textContent = data.due_date;

                            // Show the modal
                            new bootstrap.Modal(document.getElementById('invoiceModal')).show();
                        })
                        .catch(error => console.error('Error fetching invoice details:', error));
                });
            });
        });
    </script>
@endsection