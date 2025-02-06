<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model {
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'name',
        'quantity',
        'unit_price',
    ];

    // An invoice item belongs to an invoice
    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }
}
