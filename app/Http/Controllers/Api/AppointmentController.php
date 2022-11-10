<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AppointmentEstimateRequest;
use App\Http\Requests\Api\AppointmentStoreRequest;
use App\Http\Resources\Api\AppointmentEstimateResource;
use App\Services\AppointmentService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class AppointmentController
 * @package App\Http\Controllers\Api
 */
class AppointmentController extends Controller
{
    public AppointmentService $appointmentService;

    /**
     * @param AppointmentService $appointmentService
     */
    public function __construct(AppointmentService $appointmentService)
    {
        $this->appointmentService = $appointmentService;
    }

    /**
     * Booking Estimate
     * Оценка бронирования
     *
     * @queryParam specialist_role required Специалист врач
     * @queryParam booking_date required Время бронирование
     *
     * @param AppointmentEstimateRequest $appointmentEstimateRequest
     * @return AnonymousResourceCollection
     */
    public function estimate(AppointmentEstimateRequest $appointmentEstimateRequest): AnonymousResourceCollection
    {
        $result = $this->appointmentService->estimation($appointmentEstimateRequest->validated());

        return AppointmentEstimateResource::collection($result);
    }
}
