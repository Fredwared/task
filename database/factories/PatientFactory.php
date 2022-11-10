<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => Str::uuid()->toString(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'passport' => $this->faker->randomLetter . $this->faker->randomLetter .$this->faker->numerify('#######'),
            'birth_date' => $this->faker->date('Y-m-d')
        ];
    }
}
