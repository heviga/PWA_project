<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller {
    public function index() {
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }

    public function create() {
        return view('invoices.create');
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
        return view('invoices.edit', compact('invoice'));
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
}
