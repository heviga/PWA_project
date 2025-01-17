<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pouzivatels', function (Blueprint $table) {
            $table->id('IDPouzivatela');
            $table->string('Meno');
            $table->string('Priezvisko');
            $table->string('EmailPouzivatela')->unique();
            $table->string('Heslo');
            $table->string('Telefon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->dropColumn('Priezvisko');
            $table->dropColumn('EmailPouzivatela');
            $table->dropColumn('Heslo');
            $table->dropColumn('Telefon');
        });
    }
};
