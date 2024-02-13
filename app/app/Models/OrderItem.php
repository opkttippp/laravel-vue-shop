<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'price',
        'quantity',
        'product_id',
        'title',
        'image',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
