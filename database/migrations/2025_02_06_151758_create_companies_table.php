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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['as', 'sro', 'szčo']);
            $table->string('ico_companies', 20);
            $table->string('dic_companies', 20);
            $table->string('email');
            $table->string('bank_name');
            $table->string('swift', 20);
            $table->string('iban', 50);
            $table->string('account_number', 20);
            $table->string('bank_code', 20);
            $table->text('street');
            $table->string('postal_code');
            $table->string('city');
            $table->string('country');
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('user_id');
            

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
