<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Company;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Získaj štatistiky
        $totalInvoices = Invoice::count(); // Počet všetkých faktúr
        $invoicesByYear = Invoice::selectRaw('YEAR(issue_date) as year, COUNT(*) as count')
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get(); // Počet faktúr podľa rokov

        $invoicesByCompany = Invoice::selectRaw('company_id, COUNT(*) as count')
            ->groupBy('company_id')
            ->get(); // Počet faktúr podľa firiem

        $totalCompanies = Company::count(); // Počet všetkých firiem

        // Odovzdanie údajov do view
        return view('home', compact(
            'totalInvoices', 
            'invoicesByYear', 
            'invoicesByCompany', 
            'totalCompanies'
        ));
    }
}