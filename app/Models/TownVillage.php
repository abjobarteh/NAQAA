<?php

namespace App\Models;

use App\Models\RegistrationAccreditation\TrainingProvider;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TownVillage extends Model
{
    use HasFactory, LogsActivity;

    protected $table = 'towns_villages';

    protected $fillable = [
        'name',
        'district_id',
        'created_at',
        'updated_at'
    ];

    protected static $logFillable = true;
    
    protected static $logName = 'Towns/Villages';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Towns/Villages added by ".auth()->user()->username;
            case 'updated': 
                     return "Towns/Villages updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Towns/Villages deleted by ".auth()->user()->username;
        };
        
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function trainingproviders()
    {
        return $this->hasMany(TrainingProvider::class);
    }
}
