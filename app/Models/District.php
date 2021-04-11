<?php

namespace App\Models;

use App\Models\ResearchDevelopment\InstitutionDetailsDataCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class District extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'region_id',
        'created_at',
        'updated_at'
    ];

    protected static $logFillable = true;

    protected static $logName = 'District';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New District added by ".auth()->user()->username;
            case 'updated': 
                     return "District updated by ".auth()->user()->username;
            case 'deleted': 
                     return "District deleted by ".auth()->user()->username;
        };
        
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function townvillages()
    {
        return $this->hasMany(TownVillage::class);
    }

    public function InstitutionDataCollections()
    {
        return $this->hasMany(InstitutionDetailsDataCollection::class);
    }
    
}
