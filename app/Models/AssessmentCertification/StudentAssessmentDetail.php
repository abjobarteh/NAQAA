<?php

namespace App\Models\AssessmentCertification;

use App\Models\RegistrationAccreditation\Trainer;
use App\Models\TrainingProviderStudent;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class StudentAssessmentDetail extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'student_id',
        'assessor_id',
        'verifier_id',
        'comments',
        'assessment_center',
        'application_id',
        'assessment_status',
        'qualification_type',
        'last_assessment_date',
    ];

    public function setLastAssessmentDateAttribute($value)
    {
        $this->attributes['last_assessment_date'] = new Carbon($value);
    }

    public function getLastAssessmentDateAttribute($value)
    {
        return (new Carbon($value))->toFormattedDateString();
    }

    public function student()
    {
        return $this->belongsTo(TrainingProviderStudent::class, 'student_id');
    }

    public function asessor()
    {
        return $this->belongsTo(Trainer::class, 'assessor_id');
    }

    public function registration()
    {
        return $this->belongsTo(StudentRegistrationDetail::class, 'application_id');
    }
}
