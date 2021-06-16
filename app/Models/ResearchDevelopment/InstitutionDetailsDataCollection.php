<?php

namespace App\Models\ResearchDevelopment;

use App\Models\RegistrationAccreditation\TrainingProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class InstitutionDetailsDataCollection extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'institution_id',
        'financial_source',
        'estimated_yearly_turnover',
        'enrollment_capacity',
        'no_of_lecture_rooms',
        'no_of_computer_labs',
        'total_no_of_computers_in_labs',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Institution details data collection';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Institution details data collection added by " . auth()->user()->username;
            case 'updated':
                return "Institution details data collection updated by " . auth()->user()->username;
            case 'deleted':
                return "Institution details data collection deleted by " . auth()->user()->username;
        };
    }

    public function trainingprovider()
    {
        return $this->belongsTo(TrainingProvider::class, 'institution_id');
    }
}
