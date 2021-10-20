<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Designation extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'description',
        'created_at',
        'updated_at'
    ];

    protected static $logFillable = true;

    protected static $logName = 'User designations';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Designation added by " . auth()->user()->username;
            case 'updated':
                return "Designation updated by " . auth()->user()->username;
            case 'deleted':
                return "Designation deleted by " . auth()->user()->username;
        };
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
