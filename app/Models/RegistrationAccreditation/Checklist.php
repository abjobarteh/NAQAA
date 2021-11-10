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
        'description',
        'is_required',
        'is_renewal_required',
        'thematic_area_id',
    ];

    public function thematicArea()
    {
        return $this->belongsTo(ChecklistThematicArea::class, 'thematic_area_id');
    }

    public function trainingproviderchecklists()
    {
        return $this->hasMany(TrainingProviderChecklist::class, 'checklist_id');
    }
}
