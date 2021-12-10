<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ApplicationType extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'fee',
        'description',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Application Type';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Application Type created by " . auth()->user()->username;
            case 'updated':
                return "Application Type Fee {$this->attributes['name']} updated by " . auth()->user()->username . " with new amount of D{$this->attributes['fee']}";
            case 'deleted':
                return "Application Type deleted by " . auth()->user()->username;
        };
    }

    public function tokens()
    {
        return $this->hasMany(ApplicationToken::class, 'application_type_id')->latest();
    }
}
