<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

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

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Qualification added by ".auth()->user()->username;
            case 'updated': 
                     return "Qualification updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Qualification deleted by ".auth()->user()->username;
        };
        
    }
}
