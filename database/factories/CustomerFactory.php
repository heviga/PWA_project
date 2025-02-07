<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'name' => $this->faker->company(),
            'ico_customers' => $this->faker->numerify('##########'),
            'dic_customers' => $this->faker->numerify('##########'),
            'street' => $this->faker->streetAddress(),
            'postal_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
        ];
    }
}
