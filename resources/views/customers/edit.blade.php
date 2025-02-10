@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Edit Customer</h1>

        <div class="card shadow p-4">
            <form method="POST" action="{{ route('customers.update', $customer->id) }}">
                @csrf
                @method('PUT') <!-- Toto zabezpečuje, že to bude PUT požiadavka pre update -->

                <!-- Customer Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Customer Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $customer->name) }}" required>
                </div>

                <!-- ICO -->
                <div class="mb-3">
                    <label for="ico_customers" class="form-label">ICO</label>
                    <input type="text" class="form-control" id="ico_customers" name="ico_customers" value="{{ old('ico_customers', $customer->ico_customers) }}">
                </div>

                <!-- DIC -->
                <div class="mb-3">
                    <label for="dic_customers" class="form-label">DIC</label>
                    <input type="text" class="form-control" id="dic_customers" name="dic_customers" value="{{ old('dic_customers', $customer->dic_customers) }}">
                </div>

                <!-- Address Fields -->
                <div class="mb-3">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" class="form-control" id="street" name="street" value="{{ old('street', $customer->street) }}">
                </div>

                <div class="mb-3">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code', $customer->postal_code) }}">
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $customer->city) }}">
                </div>

                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $customer->country) }}">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Update Customer</button>
            </form>
        </div>
    </div>
@endsection