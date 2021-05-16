<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TrainerAccreditationDetail extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable =  [
        'area',
        'level',
        'application_id',
        'accreditation_status',
        'accreditation_start_date',
        'accreditation_end_date',
        'status',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Trainer accreditation';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Trainer accreditation added by " . auth()->user()->username;
            case 'updated':
                return "Trainer accreditation updated by " . auth()->user()->username;
            case 'deleted':
                return "Trainer accreditation deleted by " . auth()->user()->username;
        };
    }

    public function application()
    {
        return $this->belongsTo(ApplicationDetail::class, 'application_id');
    }
}
