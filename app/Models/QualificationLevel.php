<?php

namespace App\Models;

use App\Models\AssessmentCertification\StudentRegistrationDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QualificationLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'description'
    ];
    protected static $logFillable = true;

    protected static $logName = 'Qualification Level';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Qualification Level added by " . auth()->user()->username;
            case 'updated':
                return "Qualification Level updated by " . auth()->user()->username;
            case 'deleted':
                return "Qualification Level deleted by " . auth()->user()->username;
        };
    }

    public function studentAwards()
    {
        return $this->hasMany(TrainingProviderStudent::class, 'award');
    }

    public function studentEntryQualifications()
    {
        return $this->hasMany(TrainingProviderStudent::class, 'qualification_at_entry');
    }

    public function registeredStudents()
    {
        return $this->hasMany(StudentRegistrationDetail::class, 'programme_id');
    }
}
