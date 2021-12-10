<?php

namespace App\Models\ResearchDevelopment;

use App\Models\EducationField;
use App\Models\QualificationLevel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class StudentDetailsDataCollection extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'student_id',
        'firstname',
        'middlename',
        'lastname',
        'gender',
        'phone',
        'nationality',
        'date_of_birth',
        'programme',
        'attendance_status',
        'qualification_at_entry',
        'admission_date',
        'completion_date',
        'award',
        'field_of_education',
        'institution_id',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Student Detail Data collection';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Student Detail data collection record added by " . auth()->user()->username;
            case 'updated':
                return "Student Detail data collection record updated by " . auth()->user()->username;
            case 'deleted':
                return "Student Detail data collection record deleted by " . auth()->user()->username;
        };
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = new Carbon($value);
    }

    public function getFullNameAttribute()
    {
        return "{$this->firstname} .{$this->middlename}. {$this->lastname}";
    }

    public function learningcenter()
    {
        return $this->belongsTo(InstitutionDetailsDataCollection::class, 'institution_id');
    }

    public function educationField()
    {
        return $this->belongsTo(EducationField::class, 'education_field_id');
    }

    public function entryQualification()
    {
        return $this->belongsTo(QualificationLevel::class, 'qualification_at_entry');
    }

    public function awardName()
    {
        return $this->belongsTo(QualificationLevel::class, 'award');
    }
}
