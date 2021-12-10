<?php

namespace App\Models\RegistrationAccreditation;

use App\Models\TrainingProviderProgramme;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProgrammeDepartmentHead extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'rank',
        'highest_qualifications',
        'other_qualifications',
        'relevant_post_qualification_experience',
        'programme_id',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Programme Deapartment Head details';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Programme Deapartment Head details created by " . auth()->user()->username;
            case 'updated':
                return "Programme Deapartment Head details updated by " . auth()->user()->username;
            case 'deleted':
                return "Programme Deapartment Head details deleted by " . auth()->user()->username;
        };
    }

    public function programme()
    {
        return $this->belongsTo(TrainingProviderProgramme::class, 'programme_id');
    }
}
