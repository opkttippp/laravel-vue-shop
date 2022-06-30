<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable
        = [
            'title',
            'slug',
            'description',
            'price',
            'barcode',
            'stock',
            'cover',
        ];

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallerie::class);
    }
}
