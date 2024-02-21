<?php

namespace App\Enums;

use Spatie\Enum\Enum;


class StatusEnum extends Enum
{
    protected static function values(): array
    {
        return [
            'WAITING' => 0,
            'PUBLISHED' => 1,
            'DENIED' => 2,
        ];
    }
}
