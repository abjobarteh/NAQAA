<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class LocalLanguage extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Local languages';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Local languages added by " . auth()->user()->username;
            case 'updated':
                return "Local languages updated by " . auth()->user()->username;
            case 'deleted':
                return "Local languages deleted by " . auth()->user()->username;
        };
    }
}
