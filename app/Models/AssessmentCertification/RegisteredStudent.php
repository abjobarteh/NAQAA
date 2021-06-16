<?php

namespace App\Models\AssessmentCertification;

use App\Models\District;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\Region;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TownVillage;
use Carbon\Carbon;
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

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = new Carbon($value);
    }

    public function getDateOfBirthAttribute($value)
    {
        return (new Carbon($value))->toFormattedDateString();
    }

    public function setAcademicYearAttribute($value)
    {
        $this->attributes['academic_year'] = (new Carbon($value))->format('Y');
    }

    public function getAcademicYearAttribute($value)
    {
        return (new Carbon($value))->format('Y');
    }

    public function getFullNameAttribute()
    {
        return "{$this->firstname} .{$this->middlename}. {$this->lastname}";
    }

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

    public function registration()
    {
        return $this->hasOne(StudentRegistrationDetail::class, 'student_id');
    }

    public function assessments()
    {
        return $this->hasMany(StudentAssessmentDetail::class, 'student_id');
    }

    public function currentAssessment()
    {
        return $this->assessments()->where('assessment_status', '')->latest();
    }

    public function lastassessment()
    {
        return $this->assessments()->latest()->first();
    }

    public function getTableColumns()
    {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
