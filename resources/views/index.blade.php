@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Uctovnictvo</h1>

        <!-- Example: Show list of companies -->
        <table class="table">
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
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->type }}</td>
                        <td>{{ $company->ico_companies }}</td>
                        <td>{{ $company->email }}</td>
                        <td>
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
