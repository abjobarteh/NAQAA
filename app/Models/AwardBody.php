<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AwardBody extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name'];

    protected static $logFillable = true;

    protected static $logName = 'Award body';
    
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Award body added by ".auth()->user()->username;
            case 'updated': 
                     return "Award body updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Award body deleted by ".auth()->user()->username;
        };
        
    }
}
