<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TrainingProviderStaffsRole extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name','description'];

    protected $logFillable = true;

    protected static $logName = 'Training Provider Staff Role';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Training Provider Staff Role added by ".auth()->user()->username;
            case 'updated': 
                     return "Training Provider Staff Role updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Training Provider Staff Role deleted by ".auth()->user()->username;
        };
        
    }
}
