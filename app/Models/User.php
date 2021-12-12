<?php

namespace App\Models;

use App\Http\Traits\HasPermissionsTrait;
use App\Models\RegistrationAccreditation\Trainer;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\ResearchDevelopment\InstitutionDetailsDataCollection;
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
                return "New User record created by " . (auth()->user()->username ??  $this->attributes['username']);
            case 'updated':
                return "User record updated by " . (auth()->user()->username ?? $this->attributes['username']);
            case 'deleted':
                return "User record deleted by " . (auth()->user()->username ?? $this->attributes['username']);
        };
    }

    public function getFullNameAttribute()
    {
        if ($this->middlename != null) {

            return "{$this->firstname} .{$this->middlename}. {$this->lastname}";
        }
        return "{$this->firstname} {$this->lastname}";
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

    public function trainingproviderdetail()
    {
        return $this->hasOne(TrainingProvider::class, 'login_id');
    }

    public function trainerdetail()
    {
        return $this->hasOne(Trainer::class, 'login_id');
    }

    public function institutionDataCollection()
    {
        return $this->hasOne(InstitutionDetailsDataCollection::class);
    }
}
