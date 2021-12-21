<?php

namespace App\Models;

use App\Models\AssessmentCertification\StudentAssessmentDetail;
use App\Models\AssessmentCertification\StudentRegistrationDetail;
use App\Models\RegistrationAccreditation\TrainingProvider;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TrainingProviderStudent extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'student_id',
        'firstname',
        'middlename',
        'lastname',
        'date_of_birth',
        'gender',
        'email',
        'phone',
        'nationality',
        'local_language',
        'address',
        'attendance_status',
        'admission_date',
        'completion_date',
        'graduation_date',
        'region_id',
        'district_id',
        'town_village_id',
        'programme_name',
        'qualification_at_entry',
        'award',
        'field_of_education',
        'training_provider_id',
        'academic_year',
        'picture',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Training Provider Student Record';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Training Provider Student Record added by " . auth()->user()->username;
            case 'updated':
                return "Training Provider Student Record updated by " . auth()->user()->username;
            case 'deleted':
                return "Training Provider Student Record deleted by " . auth()->user()->username;
        };
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = new Carbon($value);
    }

    public function getFullNameAttribute()
    {
        if ($this->middlename != null) {

            return "{$this->firstname} .{$this->middlename}. {$this->lastname}";
        }
        return "{$this->firstname} {$this->lastname}";
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function townVillage()
    {
        return $this->belongsTo(TownVillage::class, 'townvillage_id');
    }

    public function trainingprovider()
    {
        return $this->belongsTo(TrainingProvider::class, 'training_provider_id');
    }

    public function awardName()
    {
        return $this->belongsTo(QualificationLevel::class, 'award');
    }

    public function entryQualification()
    {
        return $this->belongsTo(QualificationLevel::class, 'qualification_at_entry');
    }

    public function studentRegistrations()
    {
        return $this->hasMany(StudentRegistrationDetail::class, 'student_id');
    }

    public function registration()
    {
        return $this->hasOne(StudentRegistrationDetail::class, 'student_id')->latest();
    }


    public function getTableColumns()
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function assessments()
    {
        return $this->hasMany(StudentAssessmentDetail::class, 'student_id');
    }

    public function currentAssessment()
    {
        return $this->hasOne(StudentAssessmentDetail::class, 'student_id')->latest();
    }
}
