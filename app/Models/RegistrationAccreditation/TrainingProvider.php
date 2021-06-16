<?php

namespace App\Models\RegistrationAccreditation;

use App\Models\AssessmentCertification\EndorsedCertificateDetail;
use App\Models\District;
use App\Models\LocalGovermentAreas;
use App\Models\Region;
use App\Models\ResearchDevelopment\InstitutionDetailsDataCollection;
use App\Models\TownVillage;
use App\Models\TrainingProviderCategory;
use App\Models\TrainingProviderClassification;
use App\Models\TrainingProviderOwnership;
use App\Models\TrainingProviderProgramme;
use App\Models\TrainingProviderStudent;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TrainingProvider extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'name',
        'address',
        'po_box',
        'email',
        'fax',
        'telephone_work',
        'mobile_phone',
        'website',
        'region_id',
        'district_id',
        'town_village_id',
        'lga_id',
        'location',
        'category_id',
        'ownership_id',
        'classification_id',
        'login_id',
        'bank_signatories',
        'category_id',
        'is_registered',
        'storage_path',
    ];

    // protected $with = [
    //     'region',
    //     'district',
    //     'townVillage',
    //     'localgovermentarea',
    //     'ownership',
    //     'classification',
    //     'centerManager',
    //     'boardOfDirectors',
    //     'bankSignatories'
    // ];


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

    public function banksignatories()
    {
        return $this->hasMany(BankSignatory::class, 'training_provider_id');
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

    public function localgovermentarea()
    {
        return $this->belongsTo(LocalGovermentAreas::class, 'lga_id');
    }

    public function ownership()
    {
        return $this->belongsTo(TrainingProviderOwnership::class, 'ownership_id');
    }

    public function classification()
    {
        return $this->belongsTo(TrainingProviderClassification::class, 'classification_id');
    }

    public function category()
    {
        return $this->belongsTo(TrainingProviderCategory::class, 'category_id');
    }

    public function applications()
    {
        return $this->hasMany(ApplicationDetail::class, 'training_provider_id')->orderBy('id', 'desc');
    }

    public function recentRegistrationApplication()
    {
        return $this->hasOne(ApplicationDetail::class, 'training_provider_id')
            ->where('application_category', 'registration')->where('status', 'accepted')
            ->orderBy('id', 'desc');
    }

    public function submittedApplications()
    {
        return $this->applications()->where('application_form_status', 'submitted');
    }

    public function submittedAndPendingApplications()
    {
        return $this->submittedApplications()->where('status', 'pending');
    }

    public function licences()
    {
        return $this->hasMany(RegistrationLicenceDetail::class, 'training_provider_id');
    }
    public function validLicence()
    {
        return $this->hasOne(RegistrationLicenceDetail::class, 'training_provider_id')->where('license_status', 'valid');
    }

    public function programmes()
    {
        return $this->hasMany(TrainingProviderProgramme::class, 'training_provider_id');
    }

    public function students()
    {
        return $this->hasMany(TrainingProviderStudent::class, 'training_provider_id');
    }

    public function registeredStudents()
    {
        return $this->hasMany(TrainingProviderStudent::class, 'training_provider_id');
    }

    public function certificateEndorsements()
    {
        return $this->hasMany(EndorsedCertificateDetail::class, 'training_provider_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'login_id');
    }

    public function trainingproviderDataCollections()
    {
        return $this->hasMany(InstitutionDetailsDataCollection::class, 'institution_id');
    }
}
