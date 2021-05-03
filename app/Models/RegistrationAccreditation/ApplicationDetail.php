<?php

namespace App\Models\RegistrationAccreditation;

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
        'applicant_type',
        'application_no',
        'application_category',
        'application_type',
        'status',
        'application_form_status',
        'application_date',
        'submitted_by',
        'received_by',
        'date_received',
        'application_checklists',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Application';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Application added by ".auth()->user()->username;
            case 'updated': 
                     return "Application updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Application deleted by ".auth()->user()->username;
        };
        
    }

    public function setApplicationDateAttribute($value)
    {
        $this->attributes['application_date'] = new Carbon($value);
    }

    public function trainingprovider()
    {
        return $this->belongsTo(TrainingProvider::class,'training_provider_id');
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class,'trainer_id');
    }

    public function registrationLicence()
    {
        return $this->hasOne(RegistrationLicenceDetail::class,'application_id');
    }

    public function trainerAccreditation()
    {
        return $this->hasOne(TrainerAccreditationDetail::class,'application_id');
    }

}
