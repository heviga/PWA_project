<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;

class InvoiceController extends Controller {
    public function index() {
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }

    public function create() {
        $companies = Company::all(); // Získa všetky spoločnosti
        $customers = Customer::all(); // Získa všetkých zákazníkov
        return view('invoices.create', compact('companies', 'customers')); // Odovzdáme obidve premenné
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'customer_id' => 'required|exists:customers,id',
            'total_amount' => 'required|numeric',
            'payment_method' => 'required|in:prevodom,kartou,hotovost',
            'issue_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:issue_date',
            'delivery_date' => 'required|date',
        ]);

        Invoice::create($validatedData);

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    public function edit(Invoice $invoice) {
        $companies = Company::all();
        $customers = Customer::all();
        return view('invoices.edit', compact('invoice', 'companies', 'customers'));
    }

    public function update(Request $request, Invoice $invoice) {
        $validatedData = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'customer_id' => 'required|exists:customers,id',
            'total_amount' => 'required|numeric',
            'payment_method' => 'required|in:prevodom,kartou,hotovost',
            'issue_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:issue_date',
            'delivery_date' => 'required|date',
        ]);

        $invoice->update($validatedData);

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice) {
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }

    public function forceDelete(Invoice $invoice) {
        // Trvalé vymazanie faktúry
        $invoice->forceDelete();
        return redirect()->route('invoices.index')->with('success', 'Invoice permanently deleted.');
    }

    public function generatePdf(Company $company)
    {
        // Fetch invoices grouped by year
        $invoices = Invoice::where('company_id', $company->id)
            ->orderBy('issue_date', 'asc')
            ->get()
            ->groupBy(function($invoice) {
                return \Carbon\Carbon::parse($invoice->issue_date)->format('Y');
            });

        // Prepare total per year
        $totals = [];
        foreach ($invoices as $year => $yearInvoices) {
            $totals[$year] = $yearInvoices->sum('total_amount');
        }

        // Generate PDF
        $pdf = Pdf::loadView('pdf.invoices', compact('company', 'invoices', 'totals'));
        return $pdf->download("Invoices_{$company->name}.pdf");
    }
}
