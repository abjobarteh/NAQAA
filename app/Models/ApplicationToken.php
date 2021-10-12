<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ApplicationToken extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'token',
        'application_type_id',
        'status'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Application Tokens';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Application Tokens created by " . auth()->user()->username;
            case 'updated':
                return "Application Tokens updated by " . auth()->user()->username;
            case 'deleted':
                return "Application Tokens deleted by " . auth()->user()->username;
        };
    }

    public function applicationType()
    {
        return $this->belongsTo(ApplicationType::class);
    }
}
