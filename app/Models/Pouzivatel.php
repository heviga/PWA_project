<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pouzivatel extends Model
{
    use HasFactory;
    protected $table = 'pouzivatel'; // Table name
    protected $primaryKey = 'IDPouzivatela';
    public $timestamps = true;

    protected $fillable = [
        'Meno',
        'Priezvisko',
        'EmailPouzivatela',
        'Heslo',
        'Telefon',
    ];

    // Relationships
    public function firmy()
    {
        return $this->hasMany(Firma::class, 'IDPouzivatela', 'IDPouzivatela');
    }
}
