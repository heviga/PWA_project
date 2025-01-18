<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PolozkaFaktury>
 */
class PolozkaFakturyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'IDFaktury' => Faktura::factory(), // Link to a Faktura record
            'NazovPolozky' => $this->faker->word(),
            'Mnozstvo' => $this->faker->numberBetween(1, 100), // Quantity between 1 and 100
            'CenaBezDPH' => $this->faker->randomFloat(2, 10, 500), // Price between 10 and 500
            'DPH' => $this->faker->randomFloat(2, 5, 20), // VAT percentage between 5% and 20%
            'CenaSDPH' => function (array $attributes) {
                return $attributes['CenaBezDPH'] * (1 + $attributes['DPH'] / 100);
            },        ];
    }
}
