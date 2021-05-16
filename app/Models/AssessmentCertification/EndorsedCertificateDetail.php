<?php

namespace App\Models\AssessmentCertification;

use App\Models\RegistrationAccreditation\TrainingProvider;
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
    ];

    public function institution()
    {
        return $this->belongsTo(TrainingProvider::class, 'institution_id');
    }
}
