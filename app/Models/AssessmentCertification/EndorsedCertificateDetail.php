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
        'training_provider_id',
        'programme',
        'level',
        'total_certificates_declared',
        'total_certificates_received',
        'total_males',
        'total_females',
        'trainer_details',
        'endorsed_certificates',
        'non_endorsed_certificates',
        'programme_start_date',
        'programme_end_date',
        'request_status'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Certificate Endorsement';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Certificate Endorsement created by " . auth()->user()->username;
            case 'updated':
                return "Certificate Endorsement updated by " . auth()->user()->username;
            case 'deleted':
                return "Certificate Endorsement deleted by " . auth()->user()->username;
        };
    }

    public function getTrainerDetailsAttribute($value)
    {
        return json_decode($value);
    }

    public function trainingprovider()
    {
        return $this->belongsTo(TrainingProvider::class, 'training_provider_id');
    }
}
