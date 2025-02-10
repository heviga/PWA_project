<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth

class CompanyController extends Controller
{
    /**
     * Display a list of companies.
     */
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new company.
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to add a company.');
        }

        return view('companies.create');
    }

    /**
     * Store a newly created company in the database.
     */
    public function store(Request $request)
    {
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
        ]);

        // Assign the user_id automatically
        $validatedData['user_id'] = Auth::id();

        // Save the company
        try {
            $company = Company::create($validatedData);
            return redirect()->route('companies.index')->with('success', 'Company created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create company: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified company details.
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing a company.
     */
    public function edit(Company $company)
    {
        if (Auth::id() !== $company->user_id) {
            return redirect()->route('companies.index')->with('error', 'Unauthorized access.');
        }

        return view('companies.edit', compact('company'));
    }

    /**
     * Update the company in the database.
     */
    public function update(Request $request, Company $company)
    {
        if (Auth::id() !== $company->user_id) {
            return redirect()->route('companies.index')->with('error', 'Unauthorized access.');
        }

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
        ]);

        try {
            $company->update($validatedData);
            return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to update company: ' . $e->getMessage()]);
        }
    }

    /**
     * Delete a company.
     */
    public function destroy(Company $company)
    {
        if (Auth::id() !== $company->user_id) {
            return redirect()->route('companies.index')->with('error', 'Unauthorized access.');
        }

        try {
            $company->delete();
            return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete company: ' . $e->getMessage()]);
        }
    }
}
