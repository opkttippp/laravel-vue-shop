<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufactur extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable
        = [
            'country',
            'name',
            'image',
        ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
