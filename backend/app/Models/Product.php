<?php

namespace App\Models;

use App\Models\Concerns\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends AbstractModel
{
    use HasFactory,
        Sluggable;

    protected $guarded = [];

    public function provider(): BelongsTo
    {
        return $this->belongsTo(ProductProvider::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function details(): HasOne
    {
        return $this->hasOne(ProductDetails::class);
    }

    public function images(): BelongsToMany
    {
        return $this->belongsToMany(Image::class,ProductImage::class);
    }
}
