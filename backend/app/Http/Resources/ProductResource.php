<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'provider' => $this->provider,
            'category' => new CategoryResource($this->category),
            'material' => new MaterialResource($this->material),
            'department' => new DepartmentResource($this->department),
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'images' => new ImageCollection($this->images),
            'details' => $this->details?->toArray(),
        ];
    }
}
