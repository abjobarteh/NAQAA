<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TrainingProviderOwnership extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name','description'];

    protected $logFillable = true;

    protected static $logName = 'Training Provider ownership';

    protected static $logOnlyDirty = true;

    // public function getDescriptionForEvent(string $eventName): string
    // {
    //     switch($eventName){
    //         case 'created': 
    //                  return "New Training Provider ownership added by ".auth()->user()->username;
    //         case 'updated': 
    //                  return "Training Provider ownership updated by ".auth()->user()->username;
    //         case 'deleted': 
    //                  return "Training Provider ownership deleted by ".auth()->user()->username;
    //     };
        
    // }

    public function InstitutionDataCollections()
    {
        return $this->hasMany(InstitutionDetailsDataCollection::class, 'ownership_id');
    }
}
