<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AccreditedProgrammeStudentsData extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'programme_id',
        'student_data_type',
        'students_data',
        'projections',
    ];

    public function programme()
    {
        return $this->belongsTo(AccreditedProgramme::class, 'programme_id');
    }
}
