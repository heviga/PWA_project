<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller {
    public function index() {
        return Company::all();
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:as,sro,szčo',
            'ico_companies' => 'required|string|max:20',
            'dic_companies' => 'required|string|max:20',
            'email' => 'required|email',
            'bank_name' => 'required|string|max:255',
            'swift' => 'required|string|max:20',
            'iban' => 'required|string|max:50',
            'account_number' => 'required|string|max:20',
            'bank_code' => 'required|string|max:20',
            'street' => 'required|string',
            'postal_code' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);
        return Company::create($validatedData);
    }

    public function show(Company $company) {
        return $company;
    }

    public function update(Request $request, Company $company) {
        $company->update($request->all());
        return $company;
    }

    public function destroy(Company $company) {
        $company->delete();
        return response()->noContent();
    }
}
