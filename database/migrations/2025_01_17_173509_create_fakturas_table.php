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
        Schema::create('fakturas', function (Blueprint $table) {
            $table->id('IDFaktury');
            $table->unsignedBigInteger('IDFirmy');
            $table->string('NazovOdberatela');
            $table->string('ICO', 20);
            $table->string('DIC', 20);
            $table->string('Ulica');
            $table->string('PSC', 10);
            $table->string('Mesto');
            $table->string('Krajina');
            $table->decimal('SpoluNaUhradu', 15, 2);
            $table->enum('FormaUhrady', ['prevodom', 'kartou', 'hotovost']);
            $table->date('DatumVyhotovenia')->default(now());
            $table->date('DatumSplatnosti')->default(now()->addDays(14));
            $table->date('DatumDodania')->default(now());
            $table->timestamps();

            $table->foreign('IDFirmy')->references('IDFirmy')->on('firma')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fakturas');
    }
};
