<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model {
    use HasFactory;

    protected $fillable = [
        'company_id',
        'customer_id',
        'total_amount',
        'payment_method',
        'issue_date',
        'due_date',
        'delivery_date',
    ];
    protected $dates = ['issue_date', 'due_date', 'delivery_date'];
    // An invoice belongs to a company
    public function company() {
        return $this->belongsTo(Company::class);
    }

    // An invoice belongs to a customer
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    // An invoice has many invoice items
    public function invoiceItems() {
        return $this->hasMany(InvoiceItem::class);
    }

    // Týmto sa zabezpečí, že invoice_number bude načítané, aj keď nie je v $fillable
    public function getInvoiceNumberAttribute($value) {
        return $value; // Vracia hodnotu z databázy bez ďalších úprav
    }
    
}
