<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class EducationSubField extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name', 'description', 'code', 'education_field_id'];

    protected static $logFillable = true;

    protected static $logName = 'Subfield of Education';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Subfield of Education added by " . auth()->user()->username;
            case 'updated':
                return "Subfield of Education updated by " . auth()->user()->username;
            case 'deleted':
                return "Subfield of Education deleted by " . auth()->user()->username;
        };
    }

    public function educationField()
    {
        return $this->belongsTo(EducationField::class);
    }
}
