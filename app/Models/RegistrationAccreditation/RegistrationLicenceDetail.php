<?php

namespace App\Models\RegistrationAccreditation;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class RegistrationLicenceDetail extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'training_provider_id',
        'trainer_id',
        'application_id',
        'licence_start_date',
        'licence_end_date',
        'license_status',
        'license_no'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Registration Licence';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Registration Licence added by " . auth()->user()->username;
            case 'updated':
                return "Registration Licence updated by " . auth()->user()->username;
            case 'deleted':
                return "Registration Licence deleted by " . auth()->user()->username;
        };
    }

    public function setLicenceStartDateAttribute($value)
    {
        $this->attributes['licence_start_date'] = new Carbon($value);
    }

    public function setLicenceEndDateAttribute($value)
    {
        $this->attributes['licence_end_date'] = new Carbon($value);
    }

    public function getLicenceStartDateAttribute($value)
    {
        return new Carbon($value);
    }

    public function getLicenceEndDateAttribute($value)
    {
        return new Carbon($value);
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }

    public function trainingprovider()
    {
        return $this->belongsTo(TrainingProvider::class, 'training_provider_id');
    }

    public function application()
    {
        return $this->belongsTo(ApplicationDetail::class, 'application_id');
    }
}
