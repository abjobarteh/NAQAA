<?php

namespace App\Models;

use App\Models\ResearchDevelopment\AcademicAdminStaffDataCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TrainingProviderStaffsRank extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = ['name', 'description'];

    protected static $logFillable = true;

    protected static $logName = 'Training Provider Staff Ranks';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Training Provider Staff Rank added by " . auth()->user()->username;
            case 'updated':
                return "Training Provider Staff Rank updated by " . auth()->user()->username;
            case 'deleted':
                return "Training Provider Staff Rank deleted by " . auth()->user()->username;
        };
    }

    public function staffs()
    {
        return $this->hasMany(AcademicAdminStaffDataCollection::class, 'rank_id');
    }
}
