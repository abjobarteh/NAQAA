<?php

namespace App\Models\ResearchDevelopment;

use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class JobVacancy extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'position_advertised',
        'minimum_required_job_experience',
        'minimum_required_qualification',
        'fields_of_study',
        'job_status',
        'region_id',
        'institution'
    ];

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    protected static $logName = 'Job vacancy';

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Job vacancy data collection added by ".auth()->user()->username;
            case 'updated': 
                     return "Job vacancy data collection updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Job vacancy data collection deleted by ".auth()->user()->username;
        };
        
    }

    public function setFieldsOfStudyAttribute($value)
    {
        $this->attributes['fields_of_study'] = json_encode($value);
    }

    
    public function getFieldsOfStudyAttribute($value)
    {
        return json_decode($value);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}