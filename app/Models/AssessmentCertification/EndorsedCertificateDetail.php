<?php

namespace App\Models\AssessmentCertification;

use App\Models\RegistrationAccreditation\TrainingProvider;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class EndorsedCertificateDetail extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'institution_id',
        'programme',
        'level',
        'total_certificates',
        'total_males',
        'total_females',
        'trainer_details',
        'endorsed_certificates',
        'non_endorsed_certificates',
        'programme_start_date',
        'programme_end_date',
    ];

    public function setProgrammeStartDateAttribute($value)
    {
        $this->attributes['programme_start_date'] = new Carbon($value);
    }

    public function getProgrammeStartDateAttribute($value)
    {
        return new Carbon($value);
    }

    public function setProgrammeEndDateAttribute($value)
    {
        $this->attributes['programme_end_date'] = new Carbon($value);
    }

    public function getProgrammeEndDateAttribute($value)
    {
        return new Carbon($value);
    }

    public function getTrainerDetailsAttribute($value)
    {
        return json_decode($value);
    }

    public function institution()
    {
        return $this->belongsTo(TrainingProvider::class, 'institution_id');
    }
}
