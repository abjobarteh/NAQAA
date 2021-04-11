<?php

namespace App\Models\ResearchDevelopment;

use App\Models\TrainingProviderStaffsRank;
use App\Models\TrainingProviderStaffsRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AcademicAdminStaffDataCollection extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'qualifications',
        'specialisation',
        'main_teaching_field_of_study',
        'secondary_teaching_fields_of_study',
        'rank_id',
        'role_id',
        'institution_id'
    ];

    protected static $logFillable = true;

    protected static $logName = 'Academic and Admin Staff details data collection';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Academic and Admin Staff details data collection record added by ".auth()->user()->username;
            case 'updated': 
                     return "Academic and Admin Staff details data collection record updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Academic and Admin Staff details data collection record deleted by ".auth()->user()->username;
        };
        
    }

    public function setSecondaryTeachingFieldsOfStudyAttribute($value)
    {
        $this->attributes['secondary_teaching_fields_of_study'] = json_encode($value);
    }

    public function setQualificationsAttribute($value)
    {
        $this->attributes['qualifications'] = json_encode($value);
    }

    public function getSecondaryTeachingFieldsOfStudyAttribute($value)
    {
        return json_decode($value);
    }

    public function getQualificationsAttribute($value)
    {
        return json_decode($value);
    }

    public function getFullNameAttribute()
    {
        return "{$this->firstname} .{$this->middlename}. {$this->lastname}";
    }

    public function rank()
    {
        return $this->belongsTo(TrainingProviderStaffsRank::class,'rank_id');
    }

    public function role()
    {
        return $this->belongsTo(TrainingProviderStaffsRole::class,'role_id');
    }

    public function learningcenter()
    {
        return $this->belongsTo(InstitutionDetailsDataCollection::class,'institution_id');
    }
}
