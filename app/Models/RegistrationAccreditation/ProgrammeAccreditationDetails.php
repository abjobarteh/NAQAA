<?php

namespace App\Models\RegistrationAccreditation;

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

    protected static $logName = 'Programme accreditation';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Programme accreditation added by " . auth()->user()->username;
            case 'updated':
                return "Programme accreditation updated by " . auth()->user()->username;
            case 'deleted':
                return "Programme accreditation deleted by " . auth()->user()->username;
        };
    }

    public function application()
    {
        return $this->belongsTo(ApplicationDetail::class, 'application_id');
    }
}
