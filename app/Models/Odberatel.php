<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Odberatel extends Model
{
    use HasFactory;
    protected $table = 'odberatel';
    protected $primaryKey = 'IDOdberatela';
    public $timestamps = true;

    protected $fillable = [
        'NazovOdberatela',
        'ICOOdberatela',
        'DICOdberatela',
        'UlicaOdberatela',
        'PSCOdberatela',
        'MestoOdberatela',
        'KrajinaOdberatela',
    ];

    // Relationships
    public function faktury()
    {
        return $this->hasMany(Faktura::class, 'IDOdberatela', 'IDOdberatela');
    }
}
