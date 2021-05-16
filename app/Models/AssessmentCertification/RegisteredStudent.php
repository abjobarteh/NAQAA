<?php

namespace App\Models\AssessmentCertification;

use App\Models\District;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\Region;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TownVillage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class RegisteredStudent extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'date_of_birth',
        'gender',
        'email',
        'contact_number',
        'candidate_type',
        'address',
        'region_id',
        'district_id',
        'townvillage_id',
        'programme_id',
        'programme_level_id',
        'institution_id',
        'academic_year',
        'candidate_id',
        'picture',
    ];

    public function programme()
    {
        return $this->belongsTo(Qualification::class, 'programme_id');
    }

    public function level()
    {
        return $this->belongsTo(QualificationLevel::class, 'programme_level_id');
    }

    public function institution()
    {
        return $this->belongsTo(TrainingProvider::class, 'institution_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function townvillage()
    {
        return $this->belongsTo(TownVillage::class, 'townvillage_id');
    }

    public function registrations()
    {
        return $this->hasMany(StudentRegistrationDetail::class, 'student_id');
    }

    public function assessments()
    {
        return $this->hasMany(StudentAssessmentDetail::class, 'student_id');
    }
}
