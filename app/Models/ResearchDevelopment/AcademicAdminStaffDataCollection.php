<?php

namespace App\Models\ResearchDevelopment;

use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TrainingProviderStaffsRank;
use App\Models\TrainingProviderStaffsRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AcademicAdminStaffDataCollection extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'gender',
        'nationality',
        'date_of_birth',
        'phone',
        'email',
        'job_title',
        'salary_per_month',
        'employment_date',
        'employment_type',
        'highest_qualification',
        'other_qualifications',
        'specialisation',
        'rank',
        'role',
        'main_teaching_field_of_study',
        'secondary_teaching_fields_of_study',
        'institution_id',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Academic and Admin Staff details data collection';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Academic and Admin Staff details data collection record added by " . auth()->user()->username;
            case 'updated':
                return "Academic and Admin Staff details data collection record updated by " . auth()->user()->username;
            case 'deleted':
                return "Academic and Admin Staff details data collection record deleted by " . auth()->user()->username;
        };
    }

    public function setSecondaryTeachingFieldsOfStudyAttribute($value)
    {
        $this->attributes['secondary_teaching_fields_of_study'] = json_encode($value);
    }

    public function setOtherQualificationsAttribute($value)
    {
        $this->attributes['other_qualifications'] = json_encode($value);
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = new Carbon($value);
    }

    public function setEmploymentDateAttribute($value)
    {
        $this->attributes['employment_date'] = new Carbon($value);
    }

    public function getSecondaryTeachingFieldsOfStudyAttribute($value)
    {
        return json_decode($value);
    }

    public function getOtherQualificationsAttribute($value)
    {
        return json_decode($value);
    }

    public function getFullNameAttribute()
    {
        return "{$this->firstname} .{$this->middlename}. {$this->lastname}";
    }

    public function learningcenter()
    {
        return $this->belongsTo(TrainingProvider::class, 'institution_id');
    }
}
