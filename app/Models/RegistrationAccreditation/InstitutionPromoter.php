<?php

namespace App\Models\RegistrationAccreditation;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class InstitutionPromoter extends Model
{
    use HasFactory;

    protected $fillable = [
        'interim_authorisation_id',
        'fullname',
        'date_of_birth',
        'occupation',
        'address',
        'passport_copy',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Institution promoter details';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Institution promoter details created by " . auth()->user()->username;
            case 'updated':
                return "Institution promoter details updated by " . auth()->user()->username;
            case 'deleted':
                return "Institution promoter details deleted by " . auth()->user()->username;
        };
    }

    public function interimAuthorisation()
    {
        return $this->belongsTo(InterimAuthorisationDetail::class, 'interim_authorisation_id');
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = new Carbon($value);
    }
}
