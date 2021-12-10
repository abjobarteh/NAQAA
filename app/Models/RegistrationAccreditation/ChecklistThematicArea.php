<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ChecklistThematicArea extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'description',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Checklist thematic area';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Checklist thematic area created by " . auth()->user()->username;
            case 'updated':
                return "Checklist thematic area updated by " . auth()->user()->username;
            case 'deleted':
                return "Checklist thematic area deleted by " . auth()->user()->username;
        };
    }

    public function checklists()
    {
        return $this->hasMany(Checklist::class, 'thematic_area_id');
    }
}
