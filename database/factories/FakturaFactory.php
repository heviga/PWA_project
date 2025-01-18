<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faktura>
 */
class FakturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'IDFirmy' => Firma::factory(), // Link to a Firma record
            'NazovOdberatela' => $this->faker->name(),
            'ICO' => $this->faker->numerify('##########'),
            'DIC' => $this->faker->numerify('##########'),
            'Ulica' => $this->faker->streetAddress(),
            'PSC' => $this->faker->postcode(),
            'Mesto' => $this->faker->city(),
            'Krajina' => $this->faker->country(),
            'SpoluNaUhradu' => $this->faker->randomFloat(2, 100, 10000), // Amount between 100 and 10,000
            'FormaUhrady' => $this->faker->randomElement(['prevodom', 'kartou', 'hotovost']),
            'DatumVyhotovenia' => $this->faker->date(),
            'DatumSplatnosti' => $this->faker->date(),
            'DatumDodania' => $this->faker->date(),        ];
    }
}
