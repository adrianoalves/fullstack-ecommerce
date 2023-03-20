<?php

namespace App\Models\Concerns;

use Illuminate\Support\Str;

trait Sluggable
{
    public function getSlugAttribute(): string
    {
        return Str::slug( $this->name, '_' );
    }
}
