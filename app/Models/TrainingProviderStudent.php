<?php

namespace App\Models;

use App\Models\AssessmentCertification\StudentRegistrationDetail;
use App\Models\RegistrationAccreditation\TrainingProvider;
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
        'address',
        'attendance_status',
        'admission_date',
        'completion_date',
        'candidate_type',
        'region_id',
        'district_id',
        'town_village_id',
        'programme_name',
        'qualification_at_entry',
        'programme_id',
        'programme_level_id',
        'award',
        'field_of_education',
        'training_provider_id',
        'academic_year',
        'candidate_id',
        'picture',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->firstname}. {$this->middlename}. {$this->lastname}";
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

    public function programme()
    {
        return $this->belongsTo(Qualification::class, 'programme_id');
    }

    public function level()
    {
        return $this->belongsTo(QualificationLevel::class, 'programme_level_id');
    }

    public function registration()
    {
        return $this->hasOne(StudentRegistrationDetail::class, 'student_id');
    }

    public function getTableColumns()
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
