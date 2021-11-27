<?php

namespace App\Models;

use App\Models\AssessmentCertification\StudentRegistrationDetail;
use App\Models\StandardsCurriculum\UnitStandard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Qualification extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'tuition_fee',
        'entry_requirements',
        'mode_of_delivery',
        'minimum_duration',
        'practical',
        'qualification_level_id',
        'education_field_id',
        'education_sub_field_id',
        'qualification_code'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Qualification';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Qualification of name {$this->attributes['name']} added by " . auth()->user()->username;
            case 'updated':
                return "Qualification of name {$this->attributes['name']} updated by " . auth()->user()->username;
            case 'deleted':
                return "Qualification of name {$this->attributes['name']} deleted by " . auth()->user()->username;
        };
    }

    public function setEntryRequirementsAttribute($value)
    {
        $this->attributes['entry_requirements'] = json_encode($value);
    }

    public function getEntryRequirementsAttribute($value)
    {
        return json_decode($value);
    }

    public function unitStandards()
    {
        return $this->hasMany(UnitStandard::class, 'qualification_id');
    }

    public function level()
    {
        return $this->belongsTo(QualificationLevel::class, 'qualification_level_id');
    }

    public function fieldOfEducation()
    {
        return $this->belongsTo(EducationField::class, 'education_field_id');
    }

    public function subfieldOfEducation()
    {
        return $this->belongsTo(EducationSubField::class, 'education_sub_field_id');
    }

    public function reviews()
    {
        return $this->hasMany(QualificationReview::class)->latest();
    }

    public function lastreview()
    {
        return $this->hasOne(QualificationReview::class)->latest();
    }

    public function registeredStudents()
    {
        return $this->hasMany(StudentRegistrationDetail::class, 'programme_id');
    }
}
