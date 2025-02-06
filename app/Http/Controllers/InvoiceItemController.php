<?php

namespace App\Http\Controllers;

use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller {
    public function index() {
        return InvoiceItem::all();
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'invoice_id' => 'required|exists:invoices,id',
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'unit_price' => 'required|numeric',
        ]);
        return InvoiceItem::create($validatedData);
    }

    public function show(InvoiceItem $invoiceItem) {
        return $invoiceItem;
    }

    public function update(Request $request, InvoiceItem $invoiceItem) {
        $invoiceItem->update($request->all());
        return $invoiceItem;
    }

    public function destroy(InvoiceItem $invoiceItem) {
        $invoiceItem->delete();
        return response()->noContent();
    }
}
