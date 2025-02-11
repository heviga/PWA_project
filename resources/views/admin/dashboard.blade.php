@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Admin Dashboard</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">Total Invoices</div>
                <div class="card-body">
                    <h3>{{ $totalInvoices }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">Total Companies</div>
                <div class="card-body">
                    <h3>{{ $totalCompanies }}</h3>
                </div>
            </div>
        </div>
    </div>

    <h3 class="mt-4">Invoices Per Year</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Year</th>
                <th>Invoice Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoicesPerYear as $row)
                <tr>
                    <td>{{ $row->year }}</td>
                    <td>{{ $row->count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3 class="mt-4">Invoices Per Company</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Company Name</th>
                <th>Invoice Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoicesPerCompany as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->invoices_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<!-- ADMIN
email:
admin@admin.com
password:
adminpassword
-->