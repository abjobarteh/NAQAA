<?php

namespace App\Models\ResearchDevelopment;

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

    protected $casts = [
        'publication_date' => 'datetime:Y-m-d'
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

    public function getNameOfAuthorsAttribute($value)
    {
        return json_decode($value);
    }
}
