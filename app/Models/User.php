<?php

namespace App\Models;

use App\Http\Traits\HasPermissionsTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasPermissionsTrait; //Import The Trait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'full_name',
        'phone_number',
        'address',
        'user_status',
        'default_password_status',
        'directorate_id',
        'unit_id',
        'designation_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function directorates()
    {
        return $this->belongsTo(Directorate::class);
    }

    public function designations()
    {
        return $this->belongsTo(Designation::class);
    }

    public function units()
    {
        return $this->belongsTo(Unit::class);
    }
}
