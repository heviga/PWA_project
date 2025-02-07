<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory {
    public function definition(): array {
        return [
            'name' => $this->faker->company(),
            'type' => $this->faker->randomElement(['as', 'sro', 'szčo']),
            'ico_companies' => $this->faker->numerify('##########'),
            'dic_companies' => $this->faker->numerify('##########'),
            'email' => $this->faker->unique()->companyEmail(),
            'bank_name' => $this->faker->company(),
            'swift' => $this->faker->regexify('[A-Z]{4}[A-Z]{2}[A-Z2-9][0-9A-Z]{2,5}'),
            'iban' => $this->faker->iban(),
            'account_number' => $this->faker->numerify('##########'),
            'bank_code' => $this->faker->numerify('####'),
            'street' => $this->faker->streetAddress(),
            'postal_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'user_id' => User::factory(),
        ];
    }
}
