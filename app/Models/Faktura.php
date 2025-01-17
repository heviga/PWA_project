<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktura extends Model
{
    use HasFactory;

    protected $table = 'fakturas';
    protected $primaryKey = 'IDFaktury';

    protected $fillable = [
        'IDFirmy',
        'NazovOdberatela',
        'ICO',
        'DIC',
        'Ulica',
        'PSC',
        'Mesto',
        'Krajina',
        'SpoluNaUhradu',
        'FormaUhrady',
        'DatumVyhotovenia',
        'DatumSplatnosti',
        'DatumDodania',
    ];

    public function firma()
    {
        return $this->belongsTo(Firma::class, 'IDFirmy', 'IDFirmy');
    }

    public function polozky()
    {
        return $this->hasMany(PolozkaFaktury::class, 'IDFaktury', 'IDFaktury');
    }
}
