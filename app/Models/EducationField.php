<?php

namespace App\Models;

use App\Models\ResearchDevelopment\ProgramDetailsDataCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class EducationField extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name','description','code'];

    protected static $logFillable = true;

    protected static $logName = 'Field of Education';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Field of Education added by ".auth()->user()->username;
            case 'updated': 
                     return "Field of Education updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Field of Education deleted by ".auth()->user()->username;
        };
        
    }

    public function subFields()
    {
        return $this->hasMany(EducationSubField::class);
    }

    public function programDataCollection()
    {
        return $this->hasMany(ProgramDetailsDataCollection::class,'education_field_id');
    }
}
