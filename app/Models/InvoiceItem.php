<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model {
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'item_name',
        'quantity',
        'unit_price',
    ];

    public function invoice() {
        return $this->belongsTo(Invoice::class);
    }

    public function getTotalPriceAttribute() {
        return $this->quantity * $this->unit_price;
    }

    public function getTotalPriceWithVatAttribute() {
        // VAT 20%, 
        $vatRate = 0.20;
        return $this->getTotalPriceAttribute() * (1 + $vatRate);
    }
}
