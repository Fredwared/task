<?php

namespace App\Http\Resources\Api;

use App\Constants\AppointmentStatusConstants;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentBookingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'uuid' => $this->uuid,
            'doctor' => new DoctorResource($this->doctor),
            'patient' => new PatientResource($this->patient),
            'queue' => $this->queue_number,
            'room_number' => $this->room_number,
            'status' => AppointmentStatusConstants::LIST[$this->status],
            'booking_date' => $this->booked_at->format('Y-m-d H:i')
        ];
    }
}
