<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CenterManager extends Model
{
    use HasFactory,LogsActivity;

    protected $filable = [
        'firstname',
        'middlename',
        'lastname',
        'date_of_birth',
        'gender',
        'nationality',
        'relevant_experience',
        'qualifications',
        'training_provider_id',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Center manager';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Center manager added by ".auth()->user()->username;
            case 'updated': 
                     return "Center manager updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Center manager deleted by ".auth()->user()->username;
        };
        
    }

    public function institution()
    {
        return $this->belongsTo(TrainingProvider::class,'training_provider_id');
    }
}
