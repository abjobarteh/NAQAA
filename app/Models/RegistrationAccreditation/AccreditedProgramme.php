<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AccreditedProgramme extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'training_provider_id',
        'application_id',
        'programme_title',
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
        'duration',
        'total_qualification_time',
        'level_of_fees',
        'department_name',
        'department_establishment_date',
        'department_head_names',
        'department_head_qualifications',
        'department_head_other_qualifications',
        'department_head_experience',
        'curriculum_design_process',
        'curriculum_update',
        'programme_structure',
        'students_assessment_mode',
        'certification_mode',
        'external_examiners_appointment_evidence',
        'staff_recruitment_policy',
        'provisions_for_disability',
        'provided_safety_facilities',
        'accreditation_status',
        'accreditation_start_date',
        'accreditation_end_date',
    ];

    public function trainingprovider()
    {
        return $this->belongsTo(TrainingProvider::class, 'training_provider_id');
    }

    public function application()
    {
        return $this->belongsTo(ApplicationDetail::class, 'application_id');
    }

    public function staffs()
    {
        return $this->hasMany(AccreditedProgrammeStaff::class, 'accredited_programme_id');
    }

    public function studentsData()
    {
        return $this->hasOne(AccreditedProgrammeStudentsData::class, 'programme_id');
    }
}
