<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AppointmentEstimateRequest;
use App\Http\Requests\Api\AppointmentBookingRequest;
use App\Http\Requests\Api\AppointmentStatusChangeRequest;
use App\Http\Resources\Api\AppointmentBookingResource;
use App\Http\Resources\Api\AppointmentEstimateResource;
use App\Models\Appointment;
use App\Models\User;
use App\Services\AppointmentService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Http;

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


    /**
     * Booking appointment
     * Бронирование встречи
     *
     * @bodyParam passport string required Идентификатор пасспорта
     * @bodyParam booking_date string required Время встречи. Формат: Y-m-d H:i:s Пример: 2022-11-11 12:00:00
     *
     * @param User $user
     * @param AppointmentBookingRequest $appointmentBookingRequest
     * @return AppointmentBookingResource
     */
    public function booking(User $user, AppointmentBookingRequest $appointmentBookingRequest): AppointmentBookingResource
    {
        $appointment = $this->appointmentService->book($user, $appointmentBookingRequest->validated());

        return new AppointmentBookingResource($appointment);
    }


    /**
     * Change status
     * Смена статуса
     *
     * @bodyParam status string required Статус исполение
     *
     * @param Appointment $appointment
     * @param AppointmentStatusChangeRequest $changeRequest
     * @return AppointmentBookingResource
     */
    public function status(Appointment $appointment, AppointmentStatusChangeRequest $changeRequest)
    {
        $appointment = $this->appointmentService->changeStatus($appointment, $changeRequest->input('status'));

        return new AppointmentBookingResource($appointment);
    }
}
