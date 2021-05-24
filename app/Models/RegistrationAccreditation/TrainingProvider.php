<?php

namespace App\Models\RegistrationAccreditation;

use App\Models\AssessmentCertification\EndorsedCertificateDetail;
use App\Models\AssessmentCertification\RegisteredStudent;
use App\Models\District;
use App\Models\Region;
use App\Models\TownVillage;
use App\Models\TrainingProviderClassification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TrainingProvider extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'physical_address',
        'postal_address',
        'region_id',
        'district_id',
        'town_village_id',
        'location',
        'telephone_work',
        'mobile_phone',
        'fax',
        'email',
        'website',
        'bank_names',
        'bank_signatories',
        'category_id',
        'storage_path'
    ];

    protected $with = ['region', 'district', 'townVillage', 'category'];


    protected static $logFillable = true;

    protected static $logName = 'Training Provider';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Training Provider added by " . auth()->user()->username;
            case 'updated':
                return "Training Provider updated by " . auth()->user()->username;
            case 'deleted':
                return "Training Provider deleted by " . auth()->user()->username;
        };
    }

    public function centerManager()
    {
        return $this->hasOne(CenterManager::class, 'training_provider_id');
    }

    public function boardOfDirectors()
    {
        return $this->hasMany(BoardOfDirector::class, 'training_provider_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function townVillage()
    {
        return $this->belongsTo(TownVillage::class, 'town_village_id');
    }

    public function category()
    {
        return $this->belongsTo(TrainingProviderClassification::class, 'category_id');
    }

    public function applications()
    {
        return $this->hasMany(ApplicationDetail::class, 'training_provider_id');
    }

    public function licences()
    {
        return $this->hasMany(RegistrationLicenceDetail::class, 'training_provider_id');
    }

    public function programmes()
    {
        return $this->hasMany(AccreditedProgramme::class, 'training_provider_id');
    }

    public function registeredStudents()
    {
        return $this->hasMany(RegisteredStudent::class, 'institution_id');
    }

    public function certificateEndorsements()
    {
        return $this->hasMany(EndorsedCertificateDetail::class, 'institution_id');
    }
}
