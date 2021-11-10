<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class ChecklistThematicArea extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'description',
    ];

    public function checklists()
    {
        return $this->hasMany(Checklist::class, 'thematic_area_id');
    }
}
