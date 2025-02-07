<?php
namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller {
    public function index() {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create() {
        return view('companies.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:as,sro,szčo',
            'ico_companies' => 'required|string|max:20|unique:companies,ico_companies',
            'dic_companies' => 'nullable|string|max:20',
            'email' => 'required|email|unique:companies,email',
            'bank_name' => 'nullable|string|max:255',
            'swift' => 'nullable|string|max:20',
            'iban' => 'nullable|string|max:50',
            'account_number' => 'nullable|string|max:20',
            'bank_code' => 'nullable|string|max:20',
            'street' => 'nullable|string',
            'postal_code' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        Company::create($validatedData);
        return redirect()->route('companies.index')->with('success', 'Company created successfully.');
    }

    public function edit(Company $company) {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:as,sro,szčo',
            'ico_companies' => 'required|string|max:20|unique:companies,ico_companies,' . $company->id,
            'dic_companies' => 'nullable|string|max:20',
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'bank_name' => 'nullable|string|max:255',
            'swift' => 'nullable|string|max:20',
            'iban' => 'nullable|string|max:50',
            'account_number' => 'nullable|string|max:20',
            'bank_code' => 'nullable|string|max:20',
            'street' => 'nullable|string',
            'postal_code' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $company->update($validatedData);
        return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company) {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
    }
}
