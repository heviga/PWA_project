<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Company;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalInvoices = Invoice::count();
        $invoicesPerYear = Invoice::selectRaw('YEAR(created_at) as year, COUNT(*) as count')
                                ->groupBy('year')
                                ->get();

        $invoicesPerCompany = Company::withCount('invoices')->get();
        $totalCompanies = Company::count();

        return view('admin.dashboard', compact('totalInvoices', 'invoicesPerYear', 'invoicesPerCompany', 'totalCompanies'));
    }
}
