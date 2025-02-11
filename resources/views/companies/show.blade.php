@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $company->name }}</h1>
        <p>Address: {{ $company->address }}</p>

        <a href="{{ route('companies.export-pdf', $company->id) }}" class="btn btn-sm btn-success">
    Download Invoices PDF
</a>

    </div>
@endsection
