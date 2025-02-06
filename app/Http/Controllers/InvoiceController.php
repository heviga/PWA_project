<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller {
    public function index() {
        return Invoice::all();
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'customer_id' => 'required|exists:customers,id',
            'total_amount' => 'required|numeric',
            'payment_method' => 'required|in:prevodom,kartou,hotovost',
            'issue_date' => 'required|date',
            'due_date' => 'required|date',
            'delivery_date' => 'required|date',
        ]);
        return Invoice::create($validatedData);
    }

    public function show(Invoice $invoice) {
        return $invoice;
    }

    public function update(Request $request, Invoice $invoice) {
        $invoice->update($request->all());
        return $invoice;
    }

    public function destroy(Invoice $invoice) {
        $invoice->delete();
        return response()->noContent();
    }
}
