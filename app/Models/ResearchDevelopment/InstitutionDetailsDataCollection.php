<?php

namespace App\Models\ResearchDevelopment;

use App\Models\District;
use App\Models\LocalGovermentAreas;
use App\Models\TrainingProviderClassification;
use App\Models\TrainingProviderOwnership;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class InstitutionDetailsDataCollection extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'training_provider_name',
        'email',
        'address',
        'po_box',
        'phone',
        'website',
        'financial_source',
        'estimated_yearly_turnover',
        'enrollment_capacity',
        'no_of_lecture_rooms',
        'no_of_computer_labs',
        'total_no_of_computers_in_labs',
        'training_provider_ownership_id',
        'training_provider_classification_id',
        'district_id',
        'classification_id',
        'ownership_id',
        'lga_id',
    ];

    protected static $logFillable = true;

    protected static $logName = 'Institution details data collection';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch($eventName){
            case 'created': 
                     return "New Institution details data collection added by ".auth()->user()->username;
            case 'updated': 
                     return "Institution details data collection updated by ".auth()->user()->username;
            case 'deleted': 
                     return "Institution details data collection deleted by ".auth()->user()->username;
        };
        
    }

    public function ownership()
    {
        return $this->belongsTo(TrainingProviderOwnership::class,'ownership_id');
    }

    public function classification()
    {
        return $this->belongsTo(TrainingProviderClassification::class,'classification_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function localgovermentarea()
    {
        return $this->belongsTo(LocalGovermentAreas::class,'lga_id');
    }

    public function programdetails()
    {
        return $this->hasMany(ProgramDetailsDataCollection::class,'institution_detail_id');
    }

    public function staffs()
    {
        return $this->hasMany(AcademicAdminStaffDataCollection::class,'institution_id');
    }

}
