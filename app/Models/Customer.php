<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'ico_customers',
        'dic_customers',
        'street',
        'postal_code',
        'city',
        'country',
    ];

    // A customer can have many invoices
    public function invoices() {
        return $this->hasMany(Invoice::class);
    }
}
