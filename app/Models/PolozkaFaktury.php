<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolozkaFaktury extends Model
{
    use HasFactory;

    protected $table = 'polozka_faktury';
    protected $primaryKey = 'IDPolozky';

    protected $fillable = [
        'IDFaktury',
        'NazovPolozky',
        'Mnozstvo',
        'CenaBezDPH',
        'DPH',
        'CenaSDPH',
    ];

    // Vzťah na faktúru
    public function faktura()
    {
        return $this->belongsTo(Faktura::class, 'IDFaktury', 'IDFaktury');
    }
}
