<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory {
    public function definition(): array {
        return [
            'company_id' => Company::factory(),
            'customer_id' => Customer::factory(),
            'total_amount' => $this->faker->randomFloat(2, 100, 10000),
            'payment_method' => $this->faker->randomElement(['prevodom', 'kartou', 'hotovost']),
            'issue_date' => $this->faker->date(), // Valid random date
            'due_date' => $this->faker->dateTimeBetween('+7 days', '+14 days')->format('Y-m-d'), // Valid random date within 7–14 days
            'delivery_date' => $this->faker->dateTimeBetween('+2 days', '+7 days')->format('Y-m-d'), // Valid random date within 2–7 days
        ];
    }
}
