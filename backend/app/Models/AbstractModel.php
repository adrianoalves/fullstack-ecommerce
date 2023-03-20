<?php

namespace App\Models;

use App\Models\Enums\DefaultStatus;
use Illuminate\Database\Eloquent\Model;

Abstract class AbstractModel extends Model
{
    protected $casts = [
        'status' => DefaultStatus::class
    ];
}
