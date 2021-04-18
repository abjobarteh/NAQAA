<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Program extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name'];

    protected static $logFillable = true;

    protected static $logName = 'National Programme';
    
    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New National Programme added by ".auth()->user()->username;
            case 'updated': 
                     return "National Programme updated by ".auth()->user()->username;
            case 'deleted': 
                     return "National Programme deleted by ".auth()->user()->username;
        };
        
    }
}
