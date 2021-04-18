<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Ethnicity extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name'];

    protected static $logFillable = true;

    protected static $logName = 'Ethnicity';
    
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Ethnicity added by ".auth()->user()->username;
            case 'updated': 
                     return "Ethnicity updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Ethnicity deleted by ".auth()->user()->username;
        };
        
    }
}
