<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Odberatel>
 */
class OdberatelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NazovOdberatela' => $this->faker->company(),
            'ICOOdberatela' => $this->faker->numerify('##########'), // 10-digit identification number
            'DICOdberatela' => $this->faker->numerify('##########'), // 10-digit tax ID
            'UlicaOdberatela' => $this->faker->streetAddress(),
            'PSCOdberatela' => $this->faker->postcode(),
            'MestoOdberatela' => $this->faker->city(),
            'KrajinaOdberatela' => $this->faker->country(),        ];
    }
}
