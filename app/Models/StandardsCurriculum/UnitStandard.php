<?php

namespace App\Models\StandardsCurriculum;

use App\Models\EducationField;
use App\Models\EducationSubField;
use App\Models\QualificationLevel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class UnitStandard extends Model
{
    use HasFactory,LogsActivity;

    protected $fillable = [
        'unit_standard_title',
        'unit_standard_code',
        'minimum_required_hours',
        'developed_by_stakeholders',
        'validated_by_stakeholders',
        'validated',
        'validation_date',
        'education_field_id',
        'education_sub_field_id',
        'qualification_level_id',
    ];

    protected static $logName = 'Unit Standard';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Unit Standard was added by ".auth()->user()->username;
            case 'updated': 
                     return "Unit Standard was updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Unit Standard was deleted by ".auth()->user()->username;
        };
        
    }

    public function fieldOfEducation()
    {
        return $this->belongsTo(EducationField::class,'education_field_id');
    }

    public function subFieldOfEducation()
    {
        return $this->belongsTo(EducationSubField::class, 'education_sub_field_id');
    }

    public function levelOfQaulification()
    {
        return $this->belongsTo(QualificationLevel::class,'qualification_level_id');
    }

    public function UnitStandardReviews()
    {
        return $this->hasMany(UnitStandardReview::class, 'unit_standard_id');
    }
}
