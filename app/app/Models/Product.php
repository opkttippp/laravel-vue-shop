<?php

namespace App\Models;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use FormAccessible;
    use HasFactory;
    use SoftDeletes;

    protected $fillable
        = [
            'title',
            'slug',
            'description',
            'image',
            'price',
            'barcode',
            'stock',
            'category_id',
            'manufactur_id',
        ];
    private mixed $galleries;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallerie::class);
    }

    public function manufactur()
    {
        return $this->belongsTo(Manufactur::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
