<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'ico_companies',
        'dic_companies',
        'email',
        'bank_name',
        'swift',
        'iban',
        'account_number',
        'bank_code',
        'street',
        'postal_code',
        'city',
        'country',
        'user_id',
    ];

    // A company belongs to a user
    public function user() {
        return $this->belongsTo(User::class);
    }

    // A company has many invoices
    public function invoices() {
        return $this->hasMany(Invoice::class);
    }
}
