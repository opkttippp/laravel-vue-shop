<?php

namespace App\Models;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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

    public function getStarAttribute()
    {
        $rev = $this->reviews;

        $status = 0;
        foreach ($rev as $r) {
            $user[] = $r->user;
            $status += $r->status;
        }
        $item = Review::where('product_id', $this->id)->count();
        if ($item) {
            $stars = (round($status / $item, 2));
        } else {
            $item = 0;
            $stars = 0;
        }
        return $stars;
    }
}
