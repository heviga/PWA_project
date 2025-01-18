<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
    use HasFactory;
    protected $table = 'firma';
    protected $primaryKey = 'IDFirmy';
    public $timestamps = true;

    protected $fillable = [
        'Nazov',
        'Typ',
        'ICO',
        'DIC',
        'Banka',
        'Swift',
        'Iban',
        'CisloUctu',
        'KodBanky',
        'EmailFirmy',
        'Ulica',
        'PSC',
        'Mesto',
        'Krajina',
        'IDPouzivatela',
    ];



   // Relationships
   public function pouzivatel()
   {
       return $this->belongsTo(Pouzivatel::class, 'IDPouzivatela', 'IDPouzivatela');
   }

   public function faktury()
   {
       return $this->hasMany(Faktura::class, 'IDFirmy', 'IDFirmy');
   }

   
}

