<?php

namespace Tests\Unit;

use App\Constants\RoleConstants;
use Exception;
use Tests\TestCase;

class AppointmentControllerTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function test_get_estimation()
    {
        $randomSpecialist =  array_rand(RoleConstants::SPECIALIST_LIST);

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
}
