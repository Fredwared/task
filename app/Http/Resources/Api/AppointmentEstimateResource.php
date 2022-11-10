<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentEstimateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     * @throws \Exception
     */
    public function toArray($request)
    {
        // Begin: Fake schedule
        $availableHours = [];

        for ($i = 0; $i <= random_int(1, 5); $i++) {
            $availableHours[$i] = fake()->time('H:i');
        }

        sort($availableHours);
        // End: Fake schedule

        return [
            'uuid' => $this->uuid,
            'name' => $this->name,
            'hours' => $availableHours,
            'is_available' => true // ToDo: Change it to dynamic property when schedule feature comes
        ];
    }
}
