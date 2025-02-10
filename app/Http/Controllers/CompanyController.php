<?php

namespace App\Http\Controllers;
/* use App\Http\Controllers\Auth\Request; */
use App\Models\Company;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Auth
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;

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
        \Log::info('Company Data Received:', $request->all());
    
        // Validate all fields (only phone is nullable)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:as,sro,szčo',
            'ico_companies' => 'required|string|max:20|unique:companies,ico_companies',
            'dic_companies' => 'required|string|max:20',
            'email' => 'required|email|unique:companies,email',
            'bank_name' => 'required|string|max:255',
            'swift' => 'required|string|max:20',
            'iban' => 'required|string|max:50',
            'account_number' => 'required|string|max:20',
            'bank_code' => 'required|string|max:20',
            'street' => 'required|string',
            'postal_code' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20', // ✅ Only phone is nullable
        ]);
    
        // ✅ Automatically assign the user_id
        $validatedData['user_id'] = Auth::id();
    
        try {
            // ✅ Save the company
            Company::create($validatedData);
    
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
            'dic_companies' => 'required|string|max:20',
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'bank_name' => 'required|string|max:255',
            'swift' => 'required|string|max:20',
            'iban' => 'required|string|max:50',
            'account_number' => 'required|string|max:20',
            'bank_code' => 'required|string|max:20',
            'street' => 'required|string',
            'postal_code' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20', //  Only phone is nullable
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
    
    public function exportPDF($companyId)
    {
        // Získame všetky faktúry pre danú firmu
        $invoices = Invoice::where('company_id', $companyId)->get();

        // Nájdeme firmu podľa ID
        $company = Company::find($companyId);

        // Príprava dát pre PDF
        $array = ['title' => 'invoices.list_of_invoices'];
        $data = compact('invoices', 'company', 'array');

        // Generovanie PDF
        $pdf = PDF::loadView('pdfs.invoice', $data);

        // Generovanie a streamovanie PDF
        return $pdf->stream('invoices_'.$company->name.'.pdf');
    }

}
