<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pouzivatel>
 */
class PouzivatelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Meno' => fake()->firstName(),
            'Priezvisko' => fake()->lastName(),
            'EmailPouzivatela' => fake()->unique()->safeEmail(),  
            'Heslo' => bcrypt(fake()->password(8, 20)),
            'Telefon' => fake()->phoneNumber(),
        ];
    }
}
