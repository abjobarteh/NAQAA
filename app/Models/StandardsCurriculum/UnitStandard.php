<?php

namespace App\Models\StandardsCurriculum;

use App\Models\Qualification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class UnitStandard extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'unit_standard_title',
        'unit_standard_code',
        'minimum_required_hours',
        'developed_by_stakeholders',
        'validated_by_stakeholders',
        'validated',
        'unit_standard_type',
        'validation_date',
        'qualification_id',
        'status'
    ];

    protected $dates = [
        'validation_date'
    ];

    protected static $logName = 'Unit Standard';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Unit Standard was added by " . auth()->user()->username;
            case 'updated':
                return "Unit Standard was updated by " . auth()->user()->username;
            case 'deleted':
                return "Unit Standard was deleted by " . auth()->user()->username;
        };
    }

    public function setDevelopedByStakeholdersAttribute($value)
    {
        $this->attributes['developed_by_stakeholders'] = json_encode($value);
    }
    public function setValidatedByStakeholdersAttribute($value)
    {
        $this->attributes['validated_by_stakeholders'] = json_encode($value);
    }

    public function setValidationDateAttribute($value)
    {
        $this->attributes['validation_date'] = new Carbon($value);
    }

    public function getDevelopedByStakeholdersAttribute($value)
    {
        return json_decode($value);
    }

    public function getValidatedByStakeholdersAttribute($value)
    {
        return json_decode($value);
    }

    public function qualification()
    {
        return $this->belongsTo(Qualification::class, 'qualification_id');
    }
}
