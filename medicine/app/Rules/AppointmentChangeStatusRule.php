<?php

namespace App\Rules;

use App\Constants\AppointmentStatusConstants;
use App\Models\Appointment;
use Illuminate\Contracts\Validation\Rule;

class AppointmentChangeStatusRule implements Rule
{
    protected string $message;
    protected Appointment $appointment;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(Appointment $appointment)
    {
        $this->message = 'The validation error message.';
        $this->appointment = $appointment;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $currentStatus = $this->appointment->status;

        if (!in_array($value, array_keys(AppointmentStatusConstants::LIST))) {
            $this->message = 'Invalid status';
            return false;
        }

        if (
            $currentStatus == AppointmentStatusConstants::ARRIVED &&
            in_array($value, [AppointmentStatusConstants::CANCELED, AppointmentStatusConstants::FULFILLED])
        ) {
            return true;
        }

        if (
            $currentStatus == AppointmentStatusConstants::BOOKED &&
            in_array($value, [AppointmentStatusConstants::ARRIVED, AppointmentStatusConstants::CANCELED])
        ) {
            return true;
        }

        if(in_array($currentStatus, [AppointmentStatusConstants::CANCELED, AppointmentStatusConstants::FULFILLED])){
            $statusList = AppointmentStatusConstants::LIST;
            $this->message = "Changing $statusList[$currentStatus] to $statusList[$value] is not allowed.";
            return false;
        }

        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
