<?php

namespace App\Services;

use App\Constants\AppointmentStatusConstants;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * Class AppointmentService
 * @package App\Services
 */
class AppointmentService
{
    /**
     * @param array $validated
     * @return Collection
     */
    public function estimation(array $validated): Collection
    {
        /**
         * ToDo: Here should be queries result where we get scheduled specialists list
         *      As default we get matched specialists by role;
         */
        return User::query()
            ->where('specialist_role', '=', $validated['specialist_role'])
            ->get();
    }

    /**
     * @param array $validated
     * @return Model
     */
    public function book(User $user, array $validated): Model
    {
        /** @var PatientService $patientService */
        $patientService = app(PatientService::class);

        /** @var Patient $patient */
        $patient = $patientService->getOrCreate($validated['passport']);

        $bookingDate = Carbon::parse($validated['booking_date']);

        $queueNumber = $this->getCurrentOrder($bookingDate);

        return Appointment::query()->create([
            'uuid' => Str::uuid()->toString(),
            'user_id' => $user->id,
            'patient_id' => $patient->id,
            'room_number' => fake()->numerify('##'),
            'status' => AppointmentStatusConstants::BOOKED,
            'queue_number' => $queueNumber + 1,
            'booked_at' => $bookingDate->format('Y-m-d H:i:s'),
        ]);
    }

    /**
     * @param Carbon $dateTime
     * @return int
     */
    protected function getCurrentOrder(Carbon $dateTime): int
    {
        return Appointment::query()->whereBetween('booked_at', [$dateTime->startOfDay(), $dateTime->endOfDay()])->count();
    }

    public function changeStatus(Appointment $appointment, string $status)
    {
        $appointment->update([
            'status' => $status
        ]);

        return $appointment->fresh();
    }
}
