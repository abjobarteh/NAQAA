<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Bank extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'address'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Bank';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Bank added by " . auth()->user()->username;
            case 'updated':
                return "Bank updated by " . auth()->user()->username;
            case 'deleted':
                return "Bank deleted by " . auth()->user()->username;
        };
    }
}
