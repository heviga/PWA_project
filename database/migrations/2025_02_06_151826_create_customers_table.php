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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->collation('utf8mb4_slovak_ci');
            $table->string('ico_customers', 20)->collation('utf8mb4_slovak_ci');
            $table->string('dic_customers', 20)->collation('utf8mb4_slovak_ci');
            $table->text('street')->collation('utf8mb4_slovak_ci');
            $table->string('postal_code')->collation('utf8mb4_slovak_ci');
            $table->string('city')->collation('utf8mb4_slovak_ci');
            $table->string('country')->collation('utf8mb4_slovak_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
