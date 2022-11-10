<?php

namespace App\Constants;

/**
 * Class AppointmentStatusConstants
 * @package App\Constants
 */
class AppointmentStatusConstants
{
    const BOOKED = 1;
    const ARRIVED = 2;
    const CANCELED = 3;
    const FULFILLED = 4;


    const LIST = [
        self::BOOKED => 'BOOKED',
        self::ARRIVED => 'ARRIVED',
        self::CANCELED => 'CANCELED',
        self::FULFILLED => 'FULFILLED'
    ];
}
