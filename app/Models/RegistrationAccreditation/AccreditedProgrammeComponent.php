<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AccreditedProgrammeComponent extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'accredited_programme_id',
        'course_level_no',
        'course_title',
        'pre_requisite',
        'contact_hours_lecture',
        'contact_hours_tutorial',
        'contact_hours_practical',
        'course_group',
    ];

    public function programme()
    {
        return $this->belongsTo(AccreditedProgramme::class, 'programme_id');
    }
}
