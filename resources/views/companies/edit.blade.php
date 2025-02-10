@extends('layouts.app')

@section('title', 'Edit Company')

@section('content')
    <div class="container mt-4">
        <h1 class="text-center mb-4">Edit Company</h1>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('companies.update', $company->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card shadow">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="name">Company Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $company->name) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="type">Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="as" {{ old('type', $company->type) == 'as' ? 'selected' : '' }}>AS</option>
                            <option value="sro" {{ old('type', $company->type) == 'sro' ? 'selected' : '' }}>SRO</option>
                            <option value="szčo" {{ old('type', $company->type) == 'szčo' ? 'selected' : '' }}>SZČO</option>
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="ico_companies">ICO</label>
                        <input type="text" class="form-control" id="ico_companies" name="ico_companies" value="{{ old('ico_companies', $company->ico_companies) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="dic_companies">DIC</label>
                        <input type="text" class="form-control" id="dic_companies" name="dic_companies" value="{{ old('dic_companies', $company->dic_companies) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $company->email) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="bank_name">Bank Name</label>
                        <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ old('bank_name', $company->bank_name) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="swift">SWIFT</label>
                        <input type="text" class="form-control" id="swift" name="swift" value="{{ old('swift', $company->swift) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="iban">IBAN</label>
                        <input type="text" class="form-control" id="iban" name="iban" value="{{ old('iban', $company->iban) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="account_number">Account Number</label>
                        <input type="text" class="form-control" id="account_number" name="account_number" value="{{ old('account_number', $company->account_number) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="bank_code">Bank Code</label>
                        <input type="text" class="form-control" id="bank_code" name="bank_code" value="{{ old('bank_code', $company->bank_code) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="street">Street</label>
                        <input type="text" class="form-control" id="street" name="street" value="{{ old('street', $company->street) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ old('postal_code', $company->postal_code) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $company->city) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country" value="{{ old('country', $company->country) }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="phone">Phone (optional)</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $company->phone) }}">
                    </div>

                    <div class="form-group d-flex justify-content-center mb-3">
                        <button type="submit" class="btn btn-primary">Update Company</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection