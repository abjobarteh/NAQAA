<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'checklist_type',
        'description',
        'is_required',
        'is_renewal_required',
        'thematic_area_id',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Checklist evidence';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Checklist evidence for thematic area {$this->thematicArea->name} created by " . auth()->user()->username;
            case 'updated':
                return "Checklist evidence for thematic area {$this->thematicArea->name} updated by " . auth()->user()->username;
            case 'deleted':
                return "Checklist evidence for thematic area {$this->thematicArea->name} deleted by " . auth()->user()->username;
        };
    }

    public function thematicArea()
    {
        return $this->belongsTo(ChecklistThematicArea::class, 'thematic_area_id');
    }

    public function trainingproviderchecklists()
    {
        return $this->hasMany(TrainingProviderChecklist::class, 'checklist_id');
    }
}
