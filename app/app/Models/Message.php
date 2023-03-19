<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable
        = [
            'user_id',
            'message',
            'timezone',
            'delete_message'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
