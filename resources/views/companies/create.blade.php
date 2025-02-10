@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Register a New Company</h1>

        <div class="card shadow p-4">
            <form method="POST" action="{{ route('companies.store') }}">
                @csrf
                <!-- Mandatory Fields -->
                <div class="mb-3">
                    <label for="name" class="form-label">Company Name (Názov)</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type (Typ)</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="as">AS</option>
                        <option value="sro">SRO</option>
                        <option value="szčo">SZČO</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ico" class="form-label">ICO</label>
                    <input type="text" class="form-control" id="ico" name="ico" required>
                </div>

                <div class="mb-3">
                    <label for="dic" class="form-label">DIC</label>
                    <input type="text" class="form-control" id="dic" name="dic" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address (Adresa)</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Street, ZIP code, City, Country" required>
                </div>

                <div class="mb-3">
                    <label for="bank" class="form-label">Bank</label>
                    <input type="text" class="form-control" id="bank" name="bank" required>
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
                    <label for="account_number" class="form-label">Account Number (Číslo účtu)</label>
                    <input type="text" class="form-control" id="account_number" name="account_number" required>
                </div>

                <div class="mb-3">
                    <label for="bank_code" class="form-label">Bank Code (Kód banky)</label>
                    <input type="text" class="form-control" id="bank_code" name="bank_code" required>
                </div>

                <!-- Optional Fields -->
                <h5 class="mt-4">Optional Information</h5>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone (Telefón)</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>


                <button type="submit" class="btn btn-primary">Register Company</button>
            </form>
        </div>
    </div>
@endsection
