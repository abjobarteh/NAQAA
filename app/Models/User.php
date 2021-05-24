<?php

namespace App\Models;

use App\Http\Traits\HasPermissionsTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasPermissionsTrait, LogsActivity, CausesActivity; //Import The Trait;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'firstname',
        'middlename',
        'lastname',
        'phonenumber',
        'address',
        'user_status',
        'user_type',
        'user_category',
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

    protected static $logFillable = true;

    protected static $logName = 'User';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New User created by " . auth()->user()->username;
            case 'updated':
                return "User updated by " . auth()->user()->username;
            case 'deleted':
                return "User deleted by " . auth()->user()->username;
        };
    }

    public function directorate()
    {
        return $this->belongsTo(Directorate::class);
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
