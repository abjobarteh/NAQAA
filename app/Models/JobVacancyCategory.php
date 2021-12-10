<?php

namespace App\Models;

use App\Models\ResearchDevelopment\JobVacancy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class JobVacancyCategory extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'description'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Job vacancy category';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Job vacancy category added by " . auth()->user()->username;
            case 'updated':
                return "Job vacancy category updated by " . auth()->user()->username;
            case 'deleted':
                return "Job vacancy category deleted by " . auth()->user()->username;
        };
    }

    public function jobVacancies()
    {
        return $this->belongsTo(JobVacancy::class, 'jobvacancy_category_id');
    }
}
