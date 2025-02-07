@extends('layouts.app')

@section('title', 'Companies')

@section('content')
<h1>Companies</h1>
<a href="{{ route('companies.create') }}">Add New Company</a>
<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>ICO</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($companies as $company)
        <tr>
            <td>{{ $company->name }}</td>
            <td>{{ $company->type }}</td>
            <td>{{ $company->ico_companies }}</td>
            <td>{{ $company->email }}</td>
            <td>
                <a href="{{ route('companies.edit', $company->id) }}">Edit</a>
                <form method="POST" action="{{ route('companies.destroy', $company->id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
