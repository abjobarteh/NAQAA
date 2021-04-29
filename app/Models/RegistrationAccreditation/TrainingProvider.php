<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TrainingProvider extends Model
{
    use HasFactory, LogsActivity;

    protected $filable = [
        'name',
        'physical_address',
        'postal_address',
        'region_id',
        'district_id',
        'town_village_id',
        'location',
        'telephone_work',
        'mobile_phone',
        'fax',
        'email',
        'category_id',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Training Provider';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Training Provider added by ".auth()->user()->username;
            case 'updated': 
                     return "Training Provider updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Training Provider deleted by ".auth()->user()->username;
        };
        
    }

    public function centerManager()
    {
        return $this->hasOne(CenterManager::class,'training_provider_id');
    }

    public function boardOfDirectors()
    {
        return $this->hasMany(BoardOfDirector::class,'training_provider_id');
    }

    public function bankSignatories()
    {
        return $this->hasMany(BankSignatory::class,'training_provider_id');
    }
}
