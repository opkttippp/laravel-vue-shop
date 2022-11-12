<?php

namespace App\Models;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use FormAccessible;
    use HasFactory;
    use SoftDeletes;

    protected $fillable
        = [
            'name',
            'image',
            'color'
        ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
