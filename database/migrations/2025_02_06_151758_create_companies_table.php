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
            $table->string('name')->collation('utf8mb4_slovak_ci');
            $table->enum('type', ['as', 'sro', 'szčo'])->collation('utf8mb4_slovak_ci');
            $table->string('ico_companies', 20)->collation('utf8mb4_slovak_ci');
            $table->string('dic_companies', 20)->collation('utf8mb4_slovak_ci');
            $table->string('email')->collation('utf8mb4_slovak_ci');
            $table->string('bank_name')->collation('utf8mb4_slovak_ci');
            $table->string('swift', 20)->collation('utf8mb4_slovak_ci');
            $table->string('iban', 50)->collation('utf8mb4_slovak_ci');
            $table->string('account_number', 20)->collation('utf8mb4_slovak_ci');
            $table->string('bank_code', 20)->collation('utf8mb4_slovak_ci');
            $table->text('street')->collation('utf8mb4_slovak_ci');
            $table->string('postal_code')->collation('utf8mb4_slovak_ci');
            $table->string('city')->collation('utf8mb4_slovak_ci');
            $table->string('country')->collation('utf8mb4_slovak_ci');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
