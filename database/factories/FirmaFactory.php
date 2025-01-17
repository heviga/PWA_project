<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Firma>
 */
class FirmaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nazov' => $this->faker->company(),
            'Typ' => $this->faker->randomElement(['as', 'sro', 'szčo']),
            'ICO' => $this->faker->numerify('##########'), // Generate a 10-digit number
            'DIC' => $this->faker->numerify('##########'), // Generate a 10-digit number
            'Banka' => $this->faker->company() . ' Bank',
            'Swift' => $this->faker->swiftBicNumber(),
            'Iban' => $this->faker->iban('SK'), // Generate a Slovak IBAN
            'CisloUctu' => $this->faker->numerify('###############'), // Generate a 13-digit account number
            'KodBanky' => $this->faker->numerify('####'), // Generate a 4-digit bank code
            'EmailFirmy' => $this->faker->companyEmail(),
            'Ulica' => $this->faker->streetAddress(),
            'PSC' => $this->faker->postcode(),
            'Mesto' => $this->faker->city(),
            'Krajina' => $this->faker->country(),
            //'IDPouzivatela' => \App\Models\Pouzivatel::factory(), // Link to a Pouzivatel
        ];
    }
}
