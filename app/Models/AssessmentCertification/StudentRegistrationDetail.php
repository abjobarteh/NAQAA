<?php

namespace App\Models\AssessmentCertification;

use Carbon\Carbon;
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

    public function studentAssessments()
    {
        return $this->hasMany(StudentAssessmentDetail::class, 'application_id');
    }

    public function setRegistrationDateAttribute($value)
    {
        $this->attributes['registration_date'] = new Carbon($value);
    }

    public function getRegistrationDateAttribute($value)
    {
        return new Carbon($value);
    }
}
