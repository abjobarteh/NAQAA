<?php

namespace App\Models\RegistrationAccreditation;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class AccreditedProgramme extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'trainingprovider_id',
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
        'studentship_duration',
        'total_qualification_time',
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
    ];

    protected $with = ['departmentHeads'];
    protected static $logFillable = true;

    protected static $logName = 'Training Provider Programme';

    protected static $logOnlyDirty = true;

    public function getDescriptionForEvent(string $eventName): string
    {
        switch ($eventName) {
            case 'created':
                return "New Training Provider Programme added by " . auth()->user()->username;
            case 'updated':
                return "Training Provider Programme updated by " . auth()->user()->username;
            case 'deleted':
                return "Training Provider Programme deleted by " . auth()->user()->username;
        };
    }

    public function setAdmissionRequirementsAttribute($value)
    {
        $this->attributes['admission_requirements'] = json_encode($value);
    }
    public function getAdmissionRequirementsAttribute($value)
    {
        return json_decode($value);
    }

    public function trainingprovider()
    {
        return $this->belongsTo(TrainingProvider::class, 'training_provider_id');
    }

    public function application()
    {
        return $this->belongsTo(ApplicationDetail::class, 'programme_id');
    }

    public function staffs()
    {
        return $this->hasMany(AccreditedProgrammeStaff::class, 'accredited_programme_id');
    }

    public function departmentHeads()
    {
        return $this->hasMany(ProgrammeDepartmentHead::class, 'accredited_programme_id');
    }

    public function studentsData()
    {
        return $this->hasOne(AccreditedProgrammeStudentsData::class, 'programme_id');
    }
}
