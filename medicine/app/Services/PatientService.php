<?php

namespace App\Services;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class PatientService
 * @package App\Services
 */
class PatientService
{

    /**
     * @param string $passport
     * @return Model
     */
    public function getOrCreate(string $passport): Model
    {
        $patient = Patient::query()->where('passport', '=', $passport)->first();

        if ($patient) return $patient;

        return Patient::query()->create([
            'uuid' => Str::uuid()->toString(),
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'passport' => fake()->randomLetter . fake()->randomLetter . fake()->numerify('#######'),
            'birth_date' => fake()->dateTime
        ]);
    }
}
