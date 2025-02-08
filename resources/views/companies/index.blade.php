@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>List of Companies</h1>
        <ul class="list-group mt-4">
            @foreach($companies as $company)
                <li class="list-group-item">
                    <a href="{{ route('companies.show', $company->id) }}">{{ $company->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
