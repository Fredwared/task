<?php

namespace Tests\Unit;

use App\Constants\RoleConstants;
use App\Models\User;
use Exception;
use Tests\TestCase;

class AppointmentControllerTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test_get_estimation()
    {
        $randomSpecialist = array_rand(RoleConstants::SPECIALIST_LIST);

        $requestData = [
            'specialist_role' => RoleConstants::SPECIALIST_LIST[$randomSpecialist],
            'booking_date' => now()->addDays(random_int(2, 6))->format('Y-m-d')
        ];

        $request = $this->get(route('appointment.estimate', $requestData));

        $request->assertSuccessful();

        $request->assertJsonStructure([
            'data' => [
                '*' => [
                    'uuid',
                    'name',
                    'hours',
                    'is_available'
                ]
            ]
        ]);
    }

    /**
     * @return void
     */
    public function test_booking_doctor()
    {
        $requestData = [
            'passport' => fake()->randomLetter . fake()->randomLetter . fake()->numerify('########'),
            'booking_date' => now()->addDays(fake()->numberBetween(3, 10))->format('Y-m-d H:i:s')
        ];

        /** @var User $doctor */
        $doctor = User::query()->where('role', '=', RoleConstants::DOCTOR)->inRandomOrder()->first();

        $request = $this->post(route('appointment.booking', $doctor->uuid), $requestData);


        $request->assertSuccessful();

        $request->assertJsonStructure([
            'data' => [
                'doctor',
                'patient',
                'queue',
                'room_number',
                'status',
                'booking_date'
            ]
        ]);
    }
}
