<?php

namespace App\Models\RegistrationAccreditation;

use App\Models\TrainingProviderProgramme;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProgrammeDepartmentHead extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'rank',
        'highest_qualifications',
        'other_qualifications',
        'relevant_post_qualification_experience',
        'programme_id',
    ];

    public function programme()
    {
        return $this->belongsTo(TrainingProviderProgramme::class, 'programme_id');
    }
}
