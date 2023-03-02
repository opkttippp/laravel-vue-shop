<?php

namespace App\Models;

use Collective\Html\Eloquent\FormAccessible;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use FormAccessible;
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use HasPermissions;


    //--------------------------------email-----------------------------------
    public const STATUS_DELETED = 0;
    public const STATUS_INACTIVE = 1;
    public const STATUS_ACTIVE = 2;
    //------------------------------------------------------------------------

//    protected string $guard_name = 'web';

    protected $fillable
        = [
            'name',
            'lastname',
            'email',
            'address',
            'phone',
            'password',
            'verify_token',
            'status',
            'provider',
            'provider_id',
            'avatar',
            'access_token',
        ];

    protected $hidden
        = [
            'password',
            'remember_token',
        ];

    protected $casts
        = [
            'email_verified_at' => 'datetime',
        ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

}
