<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TrainingProviderClassification extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name','description'];

    protected $logFillable = true;

    protected static $logName = 'Training Provider classification';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Training Provider classification added by ".auth()->user()->username;
            case 'updated': 
                     return "Training Provider classification updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Training Provider classification deleted by ".auth()->user()->username;
        };
        
    }
}
