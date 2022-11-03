<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => $this->image,
            'price' => $this->price,
            'barcode' => $this->barcode,
            'stock' => $this->stock,
            'imageAll' => $this->galleries,
            'manufactur' => $this->manufactur,
            'category' => $this->category,
            'stars' => $this->star,
        ];
    }
}
