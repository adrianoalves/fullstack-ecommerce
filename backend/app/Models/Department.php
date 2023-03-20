<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
