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
        Schema::create('firma', function (Blueprint $table) {
            $table->id('IDFirmy');
            $table->string('Nazov', 255)->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->enum('Typ', ['as', 'sro', 'szčo'])->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->string('ICO', 20)->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->string('DIC', 20)->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->string('Banka', 255)->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->string('Swift', 20)->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->string('Iban', 50)->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->string('CisloUctu', 20)->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->string('KodBanky', 20)->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->string('EmailFirmy', 255)->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->text('Ulica')->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->text('PSC')->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->text('Mesto')->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->text('Krajina')->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->unsignedBigInteger('IDPouzivatela');
            //$table->foreign('IDPouzivatela')->references('IDPouzivatela')->on('pouzivatel')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('firma');
    }
};
