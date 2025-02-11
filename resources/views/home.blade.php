@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <!-- Štatistiky -->
                    <hr>
                    <h4>Statistics</h4>
                    <p><strong>Total number of invoices:</strong> {{ $totalInvoices }}</p>

                    <h5>Invoices by Year:</h5>
                    <ul>
                        @foreach($invoicesByYear as $yearData)
                            <li>{{ $yearData->year }}: {{ $yearData->count }} invoices</li>
                        @endforeach
                    </ul>

                    <h5>Invoices by Company:</h5>
                    <ul>
                        @foreach($invoicesByCompany as $companyData)
                            <li>Company ID: {{ $companyData->company_id }}: {{ $companyData->count }} invoices</li>
                        @endforeach
                    </ul>

                    <p><strong>Total number of companies:</strong> {{ $totalCompanies }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection