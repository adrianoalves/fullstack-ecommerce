<?php

namespace App\Models\Enums;

use App\Models\Concerns\IteratesOverCases;

/**
 * Backed Enum to define common statuses
 */
Enum DefaultStatus: string
{
    use IteratesOverCases;

    case ACTIVE = 'active';

    case DEACTIVATED = 'deactivated ';
}
