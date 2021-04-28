<?php

namespace App\Models\ResearchDevelopment;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ResearchSurvey extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'research_topic',
        'purpose',
        'name_of_authors',
        'key_findings',
        'recommendation',
        'publisher',
        'publication_date',
        'funded_by',
        'cost',
        'remarks',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Research Survey Documentation';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Research Survey documentation added by ".auth()->user()->username;
            case 'updated': 
                     return "Research Survey documentation updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Research Survey documentation deleted by ".auth()->user()->username;
        };
        
    }

    public function setNameOfAuthorsAttribute($value)
    {
        $this->attributes['name_of_authors'] = json_encode($value);
    }

    public function setPublicationDateAttribute($value)
    {
        $this->attributes['publication_date'] = new Carbon($value);
    }

    public function getNameOfAuthorsAttribute($value)
    {
        return json_decode($value);
    }
}
