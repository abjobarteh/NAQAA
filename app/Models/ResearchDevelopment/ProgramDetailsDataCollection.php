<?php

namespace App\Models\ResearchDevelopment;

use App\Models\EducationField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ProgramDetailsDataCollection extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'program_name',
        'duration',
        'tuition_fee_per_year',
        'entry_requirements',
        'awarding_body',
        'education_field_id',
        'institution_detail_id'
    ];

    protected static $logFillable = true;

    protected static $logOnlyDirty = true;

    protected static $logName = 'Program details data collection';

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Program details data collection added by ".auth()->user()->username;
            case 'updated': 
                     return "Program details data collection updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Program details data collection deleted by ".auth()->user()->username;
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

    public function educationfield()
    {
        return $this->belongsTo(EducationField::class,'education_field_id');
    }

    public function learningcenter()
    {
        return $this->belongsTo(InstitutionDetailsDataCollection::class,'institution_detail_id');
    }
}
