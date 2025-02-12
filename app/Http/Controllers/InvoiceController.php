<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Company;
use App\Models\Customer;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

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
        $this->generateInvoicePdf($invoice);

    
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

    $filePath = "public/invoices/invoice_{$invoice->id}.pdf";

    // Store the PDF in storage/app/public/invoices/
    Storage::put($filePath, $pdf->output());
    return response()->download(storage_path("app/{$filePath}"));

/*     return $pdf->download('invoice_' . $invoice->invoice_number . '.pdf');
 */}

public function show(Invoice $invoice)
{
    $invoice->load('customer'); // Načítanie zákazníka spolu s faktúrou
    return response()->json($invoice);
}

public function downloadZip()
    {
        $zipFileName = 'invoices_last_year.zip';
        $zipPath = storage_path("app/public/$zipFileName");

        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === TRUE) {
            // Get all invoice files
            $files = Storage::files('public/invoices');

            foreach ($files as $file) {
                $filePath = storage_path("app/" . $file);
                $fileName = basename($file);
                $zip->addFile($filePath, $fileName);
            }

            $zip->close();
        } else {
            return back()->withErrors(['error' => 'Failed to create ZIP file']);
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }

}
