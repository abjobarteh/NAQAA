<?php

namespace App\Models;

use App\Models\AssessmentCertification\RegisteredStudent;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\ResearchDevelopment\InstitutionDetailsDataCollection;
use App\Models\ResearchDevelopment\JobVacancy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Region extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Region';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Region added by " . auth()->user()->username;
            case 'updated':
                return "Region updated by " . auth()->user()->username;
            case 'deleted':
                return "Region deleted by " . auth()->user()->username;
        };
    }

    public function localgovermentareas()
    {
        return $this->hasMany(LocalGovermentAreas::class);
    }

    public function districts()
    {
        return $this->hasMany(District::class);
    }

    public function InstitutionDataCollections()
    {
        return $this->hasMany(InstitutionDetailsDataCollection::class, 'region');
    }

    public function jobvacancies()
    {
        return $this->hasMany(JobVacancy::class, 'region_id');
    }

    public function trainingproviders()
    {
        return $this->hasMany(TrainingProvider::class);
    }

    public function registeredStudents()
    {
        return $this->hasMany(RegisteredStudent::class);
    }
}
