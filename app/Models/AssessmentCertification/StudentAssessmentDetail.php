<?php

namespace App\Models\AssessmentCertification;

use App\Models\RegistrationAccreditation\Trainer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class StudentAssessmentDetail extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'student_id',
        'assessor_id',
        'application_id',
        'assessment_status',
        'qualification_type',
        'last_assessment_date',
    ];

    public function student()
    {
        return $this->belongsTo(RegisteredStudent::class, 'student_id');
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
