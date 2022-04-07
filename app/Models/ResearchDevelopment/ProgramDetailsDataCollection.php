<?php

namespace App\Models\ResearchDevelopment;

use App\Models\TrainingProviderProgramme;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProgramDetailsDataCollection extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'programme_id',
        'duration',
        'tuition_fee_per_year',
        'entry_requirements',
        'awarding_body',
        'academic_year',
    ];

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    protected static $logName = 'Program details data collection';

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Program details data collection added by " . auth()->user()->username;
            case 'updated':
                return "Program details data collection updated by " . auth()->user()->username;
            case 'deleted':
                return "Program details data collection deleted by " . auth()->user()->username;
        };
    }

    public function setEntryRequirementsAttribute($requirements)
    {
        $this->attributes['entry_requirements'] = json_encode($requirements);
    }


    public function getEntryRequirementsAttribute($requirements)
    {
        return json_decode($requirements);
    }

    public function programmeDetails()
    {
        return $this->belongsTo(TrainingProviderProgramme::class, 'programme_id');
    }

  //   protected $casts = [
  //     'entry_requirements' => 'array',
  // ];
}
