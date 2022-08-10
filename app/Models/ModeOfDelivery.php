<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ModeOfDelivery extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Mode Of Delivery';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Mode of Delivery added by " . auth()->user()->username;
            case 'updated':
                return "Mode Of Delivery updated by " . auth()->user()->username;
            case 'deleted':
                return "Mode Of Delivery deleted by " . auth()->user()->username;
        };
    }
}
