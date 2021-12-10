<?php

namespace App\Models\RegistrationAccreditation;

use App\Models\TrainingProviderProgramme;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProgrammeAccreditationDetails extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable =  [
        'application_id',
        'programme_id',
        'accreditation_status',
        'accreditation_start_date',
        'accreditation_end_date',
        'status',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Programme accreditation details';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Programme accreditation details added by " . auth()->user()->username;
            case 'updated':
                return "Programme accreditation details updated by " . auth()->user()->username;
            case 'deleted':
                return "Programme accreditation details deleted by " . auth()->user()->username;
        };
    }

    public function application()
    {
        return $this->belongsTo(ApplicationDetail::class, 'application_id');
    }

    public function programme()
    {
        return $this->belongsTo(TrainingProviderProgramme::class, 'programme_id');
    }
}
