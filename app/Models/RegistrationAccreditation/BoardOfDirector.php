<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class BoardOfDirector extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'fullname',
        'nationality',
        'work_experience',
        'position',
        'training_provider_id',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Board of director';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Board of director added by " . auth()->user()->username;
            case 'updated':
                return "Board of director updated by " . auth()->user()->username;
            case 'deleted':
                return "Board of director deleted by " . auth()->user()->username;
        };
    }

    public function institution()
    {
        return $this->belongsTo(TrainingProvider::class, 'training_provider_id');
    }
}
