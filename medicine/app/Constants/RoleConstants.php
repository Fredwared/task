<?php

namespace App\Constants;

/**
 * Class RoleConstants
 * @package App\Constants
 */
class RoleConstants
{
    const ADMINISTRATOR = 1;
    const MODERATOR = 2;
    const DOCTOR = 3;

    const DEFAULT_ROLE = self::DOCTOR;

    const LIST = [
        self::ADMINISTRATOR,
        self::MODERATOR,
        self::DOCTOR
    ];

    const ALLERGISTS = 1;
    const DERMATOLOGISTS = 2;
    const OPHTHALMOLOGISTS = 3;
    const CARDIOLOGISTS = 4;
    const ENDOCRINOLOGISTS = 5;
    const GASTROENTEROLOGISTS = 6;

    const SPECIALIST_LIST = [
        self::ALLERGISTS,
        self::DERMATOLOGISTS,
        self::OPHTHALMOLOGISTS,
        self::CARDIOLOGISTS,
        self::ENDOCRINOLOGISTS,
        self::GASTROENTEROLOGISTS,
    ];
}
