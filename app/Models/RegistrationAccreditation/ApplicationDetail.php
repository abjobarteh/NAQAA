<?php

namespace App\Models\RegistrationAccreditation;

use App\Models\TrainingProviderProgramme;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ApplicationDetail extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'training_provider_id',
        'trainer_id',
        'programme_id',
        'trainer_type',
        'application_no',
        'serial_no',
        'application_type',
        'status',
        'application_form_status',
        'submitted_from',
        'checklists'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Application';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Application added by " . auth()->user()->username;
            case 'updated':
                return "Application updated by " . auth()->user()->username;
            case 'deleted':
                return "Application deleted by " . auth()->user()->username;
        };
    }

    public function setApplicationDateAttribute($value)
    {
        $this->attributes['application_date'] = new Carbon($value);
    }

    public function getApplicationDateAttribute($value)
    {
        return new Carbon($value);
    }

    public function trainingprovider()
    {
        return $this->belongsTo(TrainingProvider::class, 'training_provider_id');
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }

    public function registrationLicence()
    {
        return $this->hasOne(RegistrationLicenceDetail::class, 'application_id');
    }

    public function trainerAccreditations()
    {
        return $this->hasMany(TrainerAccreditationDetail::class, 'application_id');
    }

    public function programmeAccreditations()
    {
        return $this->hasOne(ProgrammeAccreditationDetails::class, 'application_id');
    }

    public function interimAuthorisation()
    {
        return $this->hasOne(InterimAuthorisationDetail::class, 'application_id');
    }

    public function trainingproviderprogramme()
    {
        return $this->belongsTo(TrainingProviderProgramme::class, 'programme_id');
    }
}
