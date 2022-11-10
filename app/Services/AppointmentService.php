<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

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
}
