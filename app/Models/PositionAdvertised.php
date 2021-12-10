<?php

namespace App\Models;

use App\Models\ResearchDevelopment\JobVacancy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class PositionAdvertised extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Job Vacancy Position';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Job Vacancy Position added by " . auth()->user()->username;
            case 'updated':
                return "Job Vacancy Position updated by " . auth()->user()->username;
            case 'deleted':
                return "Job Vacancy Position deleted by " . auth()->user()->username;
        };
    }

    public function jobvacancies()
    {
        return $this->hasMany(JobVacancy::class, 'position_advertised_id');
    }
}
