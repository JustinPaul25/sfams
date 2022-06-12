<?php

namespace App\Types;

final class RoleType
{
    const ADMINISTRATOR = 'Administrator';
    const STAFF = 'Staff';
    const STUDENT = 'Student';

    public static function toArray(): array
    {
        return [
            self::ADMINISTRATOR,
            self::STAFF,
            self::STUDENT,
        ];
    }
}