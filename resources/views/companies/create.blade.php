@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Register a New Company</h1>

        <div class="card shadow p-4">
    @if($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    @endif
            <form method="POST" action="{{ route('companies.store') }}">
                @csrf

                <!-- Company Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Company Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <!-- Type -->
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="as">AS</option>
                        <option value="sro">SRO</option>
                        <option value="szčo">SZČO</option>
                    </select>
                </div>

                <!-- ICO (Unique Identifier) -->
                <div class="mb-3">
                    <label for="ico_companies" class="form-label">ICO</label>
                    <input type="text" class="form-control" id="ico_companies" name="ico_companies" required>
                </div>

                <!-- DIC -->
                <div class="mb-3">
                    <label for="dic_companies" class="form-label">DIC</label>
                    <input type="text" class="form-control" id="dic_companies" name="dic_companies" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <!-- Address Fields -->
                <div class="mb-3">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" class="form-control" id="street" name="street" required>
                </div>

                <div class="mb-3">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" required>
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                </div>

                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" required>
                </div>

                <!-- Bank Details -->
                <div class="mb-3">
                    <label for="bank_name" class="form-label">Bank Name</label>
                    <input type="text" class="form-control" id="bank_name" name="bank_name" required>
                </div>

                <div class="mb-3">
                    <label for="swift" class="form-label">SWIFT</label>
                    <input type="text" class="form-control" id="swift" name="swift" required>
                </div>

                <div class="mb-3">
                    <label for="iban" class="form-label">IBAN</label>
                    <input type="text" class="form-control" id="iban" name="iban" required>
                </div>

                <div class="mb-3">
                    <label for="account_number" class="form-label">Account Number</label>
                    <input type="text" class="form-control" id="account_number" name="account_number" required>
                </div>

                <div class="mb-3">
                    <label for="bank_code" class="form-label">Bank Code</label>
                    <input type="text" class="form-control" id="bank_code" name="bank_code" required>
                </div>

                <!-- Optional Phone Number -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone (Optional)</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Register Company</button>
            </form>
        </div>
    </div>
@endsection
