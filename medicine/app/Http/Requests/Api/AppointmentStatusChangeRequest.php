<?php

namespace App\Http\Requests\Api;

use App\Models\Appointment;
use App\Rules\AppointmentChangeStatusRule;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentStatusChangeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        /** @var Appointment $appointment */
        $appointment = $this->route('appointment');

        return [
            'status' => ['required', new AppointmentChangeStatusRule($appointment)]
        ];
    }
}
