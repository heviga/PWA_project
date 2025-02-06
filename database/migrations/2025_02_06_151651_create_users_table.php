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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->collation('utf8mb4_slovak_ci');
            $table->string('last_name')->collation('utf8mb4_slovak_ci');
            $table->string('email')->unique()->collation('utf8mb4_slovak_ci');
            $table->string('password')->collation('utf8mb4_slovak_ci');
            $table->string('phone')->nullable()->collation('utf8mb4_slovak_ci');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
