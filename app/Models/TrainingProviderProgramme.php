<?php

namespace App\Models;

use App\Models\RegistrationAccreditation\ApplicationDetail;
use App\Models\RegistrationAccreditation\ProgrammeAccreditationDetails;
use App\Models\RegistrationAccreditation\ProgrammeDepartmentHead;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\ResearchDevelopment\ProgramDetailsDataCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class TrainingProviderProgramme extends Model
{
    use HasFactory, LogsActivity;

    protected $with = [
        'trainingprovider',
        'fieldOfEducation',
    ];

    protected $fillable = [
        'training_provider_id',
        'programme_id',
        'level',
        'mentoring_institution',
        'mentoring_institution_address',
        'programme_affiliation_proof',
        'programme_support_proof',
        'programme_aims',
        'programme_objectives',
        'admission_requirements',
        'progression_requirements',
        'learning_outcomes',
        'studentship_duration',
        'programme_duration_months',
        'total_qualification_time_months',
        'total_qualification_time_hours',
        'level_of_fees',
        'department_name',
        'department_establishment_date',
        'curriculum_design_process',
        'curriculum_update',
        'programme_structure',
        'students_assessment_mode',
        'certification_mode',
        'external_examiners_appointment_evidence',
        'staff_recruitment_policy',
        'provisions_for_disability',
        'provided_safety_facilities',
        'field_of_education',
        'awarding_body',
        'is_accredited'
    ];

    public function setAdmissionRequirementsAttribute($requirements)
    {
        $this->attributes['admission_requirements'] = json_encode($requirements);
    }


    public function getAdmissionRequirementsAttribute($requirements)
    {
        return json_decode($requirements);
    }

    public function trainingprovider()
    {
        return $this->belongsTo(TrainingProvider::class, 'training_provider_id');
    }

    public function programme()
    {
        return $this->belongsTo(Program::class, 'programme_id');
    }

    public function programmeDatacollection()
    {
        return $this->hasMany(ProgramDetailsDataCollection::class, 'programme_id');
    }

    public function fieldOfEducation()
    {
        return $this->belongsTo(EducationField::class, 'field_of_education');
    }

    public function departmentHeads()
    {
        return $this->hasMany(ProgrammeDepartmentHead::class, 'programme_id');
    }

    public function accreditations()
    {
        return $this->hasMany(ProgrammeAccreditationDetails::class, 'programme_id');
    }

    public function applications()
    {
        return $this->hasMany(ApplicationDetail::class, 'programme_id');
    }
}
