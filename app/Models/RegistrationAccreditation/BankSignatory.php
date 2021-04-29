<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class BankSignatory extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'position',
        'training_provider_id'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Bank signatory';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Bank signatory added by ".auth()->user()->username;
            case 'updated': 
                     return "Bank signatory updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Bank signatory deleted by ".auth()->user()->username;
        };
        
    }

    public function institution()
    {
        return $this->belongsTo(TrainingProvider::class,'training_provider_id');
    }

}
