<?php

namespace App\Models\RegistrationAccreditation;

use App\Models\AssessmentCertification\StudentAssessmentDetail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Trainer extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'date_of_birth',
        'gender',
        'country_of_citizenship',
        'TIN',
        'NIN',
        'AIN',
        'email',
        'physical_address',
        'postal_address',
        'phone_home',
        'phone_mobile',
        'employment_history',
        'authentications',
        'type',
        'academic_qualifications',
        'relevant_experiences',
        'storage_path',
        'login_id'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Trainer';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Trainer added by " . auth()->user()->username;
            case 'updated':
                return "Trainer updated by " . auth()->user()->username;
            case 'deleted':
                return "Trainer deleted by " . auth()->user()->username;
        };
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = new Carbon($value);
    }

    public function getDateOfBirthAttribute($value)
    {
        return new Carbon($value);
    }

    public function getFullNameAttribute()
    {
        if ($this->middlename != null) {

            return "{$this->firstname} .{$this->middlename}. {$this->lastname}";
        }
        return "{$this->firstname} {$this->lastname}";
    }

    public function applications()
    {
        return $this->hasMany(ApplicationDetail::class, 'trainer_id');
    }

    public function accreditations()
    {
        return $this->hasMany(TrainerAccreditationDetail::class, 'trainer_id')->orderBy('id', 'desc');
    }
    public function currentAccreditation()
    {
        return $this->accreditaitons()->where('status', 'accepted')->where('accreditation_status', 'valid')->first();
    }

    public function accreditedAreas()
    {
        return $this->accreditations()->where('status', 'accepted')->where('accreditation_status', 'valid');
    }

    public function licences()
    {
        return $this->hasMany(RegistrationLicenceDetail::class, 'trainer_id');
    }

    public function assessments()
    {
        return $this->hasMany(StudentAssessmentDetail::class, 'assessor_id');
    }

    public function logindetail()
    {
        return $this->belongsTo(User::class, 'login_id');
    }
}
