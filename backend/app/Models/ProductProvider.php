<?php

namespace App\Models;

use App\Models\Concerns\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductProvider extends AbstractModel
{
    use HasFactory,
        Sluggable;
}
