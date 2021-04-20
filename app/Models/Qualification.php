<?php

namespace App\Models;

use App\Models\StandardsCurriculum\UnitStandard;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Qualification extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'tutition_fee',
        'entry_requirements',
        'description',
        'duration',
        'qualification_level_id',
        'education_field_id',
        'education_sub_field_id',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Qualification';

    protected static $logOnlyDirty = true;

    // public function getDescriptionForEvent(string $eventName): string
    // {
    //     switch($eventName){
    //         case 'created': 
    //                  return "New Qualification added by ".auth()->user()->username;
    //         case 'updated': 
    //                  return "Qualification updated by ".auth()->user()->username;
    //         case 'deleted': 
    //                  return "Qualification deleted by ".auth()->user()->username;
    //     };
        
    // }

    public function setEntryRequirementsAttribute($value)
    {
        $this->attributes['entry_requirements'] = json_encode($value);
    }

    public function getEntryRequirementsAttribute($value)
    {
        return json_decode($value);
    }

    public function unitStandards()
    {
        return $this->hasMany(UnitStandard::class,'qualification_id');
    }
}
