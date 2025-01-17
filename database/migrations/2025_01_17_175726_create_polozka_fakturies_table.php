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
        Schema::create('polozka_fakturies', function (Blueprint $table) {
            $table->id('IDPolozky'); // Primárny kľúč pre položku faktúry
            $table->unsignedBigInteger('IDFaktury'); // Cudzí kľúč pre faktúru
            $table->string('NazovPolozky'); // Názov položky
            $table->integer('Mnozstvo'); // Množstvo položky
            $table->decimal('CenaBezDPH', 10, 2); // Cena bez DPH
            $table->decimal('DPH', 5, 2); // DPH (percento)
            $table->decimal('CenaSDPH', 10, 2); // Cena s DPH
            $table->timestamps(); // Časy vytvorenia a aktualizácie

            // Cudzí kľúč - vzťah na faktúru
            $table->foreign('IDFaktury')->references('IDFaktury')->on('fakturas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('polozka_fakturies');
    }
};
