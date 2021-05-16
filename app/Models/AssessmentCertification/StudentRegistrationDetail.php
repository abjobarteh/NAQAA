<?php

namespace App\Models\AssessmentCertification;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class StudentRegistrationDetail extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'student_id',
        'registration_no',
        'serial_no',
        'registration_date',
    ];

    public function registeredStudent()
    {
        return $this->belongsTo(RegisteredStudent::class, 'student_id');
    }
}
