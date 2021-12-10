<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingProviderChecklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'training_provider_id',
        'trainer_id',
        'checklist_id',
        'path',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Checklist evidence details';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Checklist evidence details uploaded by " . auth()->user()->username;
            case 'updated':
                return "Checklist evidence details updated by " . auth()->user()->username;
            case 'deleted':
                return "Checklist evidence details deleted by " . auth()->user()->username;
        };
    }

    public function checklist()
    {
        return $this->belongsTo(Checklist::class, 'checklist_id');
    }

    public function trainingprovider()
    {
        return $this->belongsTo(TrainingProvider::class, 'training_provider_id');
    }
}
