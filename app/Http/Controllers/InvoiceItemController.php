<?php

namespace App\Http\Controllers;

use App\Models\InvoiceItem;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller {
    public function index() {
        $invoiceItems = InvoiceItem::all();
        return view('invoice_items.index', compact('invoiceItems'));
    }

    public function create() {
        $invoices = Invoice::all();
        return view('invoice_items.create', compact('invoices'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'item_name' => 'required|string|max:255', // ✅ Updated
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
        ]);

        InvoiceItem::create($validatedData);

        return redirect()->route('invoice_items.index')->with('success', 'Invoice item added successfully.');
    }

    public function edit(InvoiceItem $invoiceItem) {
        return view('invoice_items.edit', compact('invoiceItem'));
    }

    public function update(Request $request, InvoiceItem $invoiceItem) {
        $validatedData = $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'item_name' => 'required|string|max:255', // ✅ Updated
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0',
        ]);

        $invoiceItem->update($validatedData);

        return redirect()->route('invoice_items.index')->with('success', 'Invoice item updated successfully.');
    }

    public function destroy(InvoiceItem $invoiceItem) {
        $invoiceItem->delete();
        return redirect()->route('invoice_items.index')->with('success', 'Invoice item deleted successfully.');
    }
}
