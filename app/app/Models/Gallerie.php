<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallerie extends Model
{
    use HasFactory;

    protected $fillable
        = [
            'photos',
            'product_id',
        ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
