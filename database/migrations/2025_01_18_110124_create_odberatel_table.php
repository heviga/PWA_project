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
        Schema::create('odberatel', function (Blueprint $table) {
            $table->id('IDOdberatela');
            $table->string('NazovOdberatela', 255)->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->string('ICOOdberatela', 20)->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->string('DICOdberatela', 20)->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->text('UlicaOdberatela')->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->text('PSCOdberatela')->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->text('MestoOdberatela')->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->text('KrajinaOdberatela')->charset('utf8mb4')->collation('utf8mb4_slovak_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('odberatel');
    }
};
