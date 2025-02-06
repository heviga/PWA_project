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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('customer_id');
            $table->decimal('total_amount', 10, 2)->collation('utf8mb4_slovak_ci');
            $table->enum('payment_method', ['prevodom', 'kartou', 'hotovost'])->collation('utf8mb4_slovak_ci');
            $table->date('issue_date')->default(now())->collation('utf8mb4_slovak_ci');
            $table->date('due_date')->default(now()->addDays(14))->collation('utf8mb4_slovak_ci');
            $table->date('delivery_date')->default(now())->collation('utf8mb4_slovak_ci');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
