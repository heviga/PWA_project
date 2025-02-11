<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Company;
use App\Models\Customer;
use PDF;
use Illuminate\Http\Request;

class InvoiceController extends Controller {
    public function index()
{
    $companies = Company::with('invoices.customer')->get();
    return view('invoices.index', compact('companies'));
}

    public function create(Request $request)
    {
    $selectedCompany = null;

    if ($request->has('company_id')) {
        $selectedCompany = Company::findOrFail($request->company_id);
    }

    return view('invoices.create', [
        'companies' => Company::all(),
        'customers' => Customer::all(),
        'selectedCompany' => $selectedCompany,
    ]);
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
            'invoice_items.*.item_name' => 'required|string',
            'invoice_items.*.quantity' => 'required|numeric|min:1',
            'invoice_items.*.unit_price' => 'required|numeric|min:0',
        ]);
    
        $invoice = Invoice::create($validatedData);
    
        // Uloženie položiek faktúry
        foreach ($validatedData['invoice_items'] as $itemData) {
            $invoice->invoiceItems()->create($itemData);
        }
    
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

    public function generateInvoicePdf(Invoice $invoice)
{
    $company = $invoice->company;
    $customer = $invoice->customer;

    $pdf = PDF::loadView('invoices.single_invoice_pdf', compact('invoice', 'company', 'customer'));

    return $pdf->download('invoice_' . $invoice->invoice_number . '.pdf');
}

}
