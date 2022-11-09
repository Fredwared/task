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
}
