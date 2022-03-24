<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
//---------------переименование таблицы, ключа-------------------------
//    protected $table = 'post';
//---------------переименование первичного ключа-----------------------
//    protected $primaryKey = 'flight_id';
//---------------отмена created_at и udated_at-------------------------
//    public $timestamps = false;
//---------------переименование created_at и udated_at-------------------------
//    const CREATED_AT = 'creation_date';
//    const UPDATED_AT = 'updated_date';
    use HasFactory;
}
