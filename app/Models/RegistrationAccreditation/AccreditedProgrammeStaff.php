<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AccreditedProgrammeStaff extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'programme_id',
        'name',
        'gender',
        'nationality',
        'date_of_birth',
        'phone',
        'rank',
        'employement_date',
        'staff_type',
        'qualifications',
        'post_qualification_experience',
        'courses_taught',
        'extra_curricular_activities',
        'remarks',
    ];

    public function programme()
    {
        return $this->belongsTo(AccreditedProgramme::class, 'programme_id');
    }
}
