@extends('layouts.app')

@section('title', 'Add Customer')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Add New Customer</h1>

        <div class="card shadow p-4">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('customers.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Customer Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Customer Name" required>
                </div>

                <div class="mb-3">
                    <label for="ico_customers" class="form-label">ICO</label>
                    <input type="text" class="form-control" id="ico_customers" name="ico_customers" placeholder="Enter ICO">
                </div>

                <div class="mb-3">
                    <label for="dic_customers" class="form-label">DIC</label>
                    <input type="text" class="form-control" id="dic_customers" name="dic_customers" placeholder="Enter DIC">
                </div>

                <div class="mb-3">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" class="form-control" id="street" name="street" placeholder="Enter Street">
                </div>

                <div class="mb-3">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Enter Postal Code">
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
                </div>

                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country">
                </div>

                <button type="submit" class="btn btn-primary w-100">Save Customer</button>
            </form>
        </div>
    </div>
@endsection
