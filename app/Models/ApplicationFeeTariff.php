<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ApplicationFeeTariff extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'amount',
        'application_category',
        'application_type',
        'applicant_type',
        'approved',
        'description'
    ];

    protected $logFillable = true;

    protected static $logName = 'Application Fees Tariffs';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Application fee tariff added by ".auth()->user()->username;
            case 'updated': 
                     return "Application fee tariff updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Application fee tariff deleted by ".auth()->user()->username;
        };
        
    }
}
