<?php

namespace App\Models\RegistrationAccreditation;

use App\Models\EducationField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TrainerAccreditationDetail extends Model
{
    use HasFactory, LogsActivity;

    // protected $fillable =  [
    //     'area',
    //     'programme_id',
    //     'programme_level_id',
    //     'application_id',
    //     'trainer_id',
    //     'status',
    //     'accreditation_status',
    //     'accreditation_start_date',
    //     'accreditation_end_date',
    //     'field_of_education_id',
    // ];

    protected $guarded = [];

    protected static $logFillable = true;

    protected static $logName = 'Trainer accreditation details';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Trainer accreditation details added by " . auth()->user()->username;
            case 'updated':
                return "Trainer accreditation details updated by " . auth()->user()->username;
            case 'deleted':
                return "Trainer accreditation details deleted by " . auth()->user()->username;
        };
    }

    public function application()
    {
        return $this->belongsTo(ApplicationDetail::class, 'application_id');
    }

    public function fieldOfEducation()
    {
        return $this->belongsTo(EducationField::class, 'field_of_education_id');
    }

    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }
}
