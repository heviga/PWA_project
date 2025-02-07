<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
    ];

    protected $hidden = [
        'password', // Hide the password field from serialization
        'remember_token',
    ];

    // A user can have many companies
    public function companies() {
        return $this->hasMany(Company::class);
    }
}
