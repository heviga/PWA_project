@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $company->name }}</h1>
        <p>Address: {{ $company->address }}</p>

        <a href="{{ route('invoices.pdf', $company->id) }}" class="btn btn-primary">
            Generate Invoices PDF
        </a>
    </div>
@endsection
