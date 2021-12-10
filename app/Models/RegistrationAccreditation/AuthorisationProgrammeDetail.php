<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorisationProgrammeDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'interim_authorisation_id',
        'title',
        'qualification_to_attain',
        'duration',
        'justification',
        'description',
        'objectives',
        'learning_outcome',
        'target_students',
        'entry_requirements',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Programme Authorisation Detail';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Programme Authorisation Detail created by " . auth()->user()->username;
            case 'updated':
                return "Programme Authorisation Detail updated by " . auth()->user()->username;
            case 'deleted':
                return "Programme Authorisation Detail deleted by " . auth()->user()->username;
        };
    }

    public function interimAuthorisation()
    {
        return $this->belongsTo(InterimAuthorisationDetail::class, 'interim_authorisation_id');
    }
}
