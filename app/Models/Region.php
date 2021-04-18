<?php

namespace App\Models;

use App\Models\ResearchDevelopment\InstitutionDetailsDataCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Region extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Region';

    protected static $logOnlyDirty = true;

    // public function getDescriptionForEvent(string $eventName): string
    // {
    //     switch($eventName){
    //         case 'created': 
    //                  return "New Region added by ".auth()->user()->username;
    //         case 'updated': 
    //                  return "Region updated by ".auth()->user()->username;
    //         case 'deleted': 
    //                  return "Region deleted by ".auth()->user()->username;
    //     };
        
    // }

    public function localgovermentareas()
    {
        return $this->hasMany(LocalGovermentAreas::class);
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function InstitutionDataCollections()
    {
        return $this->hasMany(InstitutionDetailsDataCollection::class,'region');
    }
}
