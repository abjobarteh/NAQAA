<?php

namespace App\Http\Livewire\AssessmentCertification;

use App\Models\AssessmentCertification\StudentRegistrationDetail;
use App\Models\Country;
use App\Models\District;
use App\Models\LocalLanguage;
use App\Models\Qualification;
use App\Models\QualificationLevel;
use App\Models\Region;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\StandardsCurriculum\UnitStandard;
use App\Models\TownVillage;
use App\Models\TrainingProviderStudent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Symfony\Component\HttpFoundation\Response;

class NewStudentRegistration extends Component
{
    use WithFileUploads;

    public $training_provider_id, $candidate_type, $academic_year, $firstname, $middlename, $lastname,
        $gender, $date_of_birth, $nationality, $local_language, $ethnicity, $address, $email, $phone,
        $programme_id, $programme_level_id, $region_id, $district_id, $town_village_id, $picture;
    public $unit_standards, $student_unit_standards, $hide_unit_standards = true;
    public $is_error = false, $error_msg, $is_picture_uploaded = false;

    protected $rules = [
        'firstname' => 'required|string',
        'middlename' => 'nullable|string',
        'lastname' => 'required|string',
        'date_of_birth' => 'required|date',
        'gender' => 'required|in:male,female',
        'email' => 'required|email',
        'phone' => 'required|string',
        'candidate_type' => 'required|in:private,regular',
        'address' => 'required|string',
        'local_language' => 'required|string',
        'nationality' => 'required|string',
        'region_id' => 'nullable|numeric',
        'district_id' => 'nullable|numeric',
        'town_village_id' => 'nullable|numeric',
        'programme_id' => 'required|numeric',
        'programme_level_id' => 'required|numeric',
        'training_provider_id' => 'required|numeric',
        'student_unit_standards' => 'required_with:programme_id,programme_level_id|array',
        'academic_year' => 'required|string',
        'picture' => 'nullable|file|mimes:jpg,png|max:2048',
    ];

    public function mount()
    {
        abort_if(Gate::denies('access_student_registration'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }

    public function render()
    {
        $institutions = TrainingProvider::whereHas('licences', function (Builder $query) {
            $query->where('license_status', 'Approved');
        })->pluck('name', 'id');
        $programmes = Qualification::all()->pluck('name', 'id');
        $levels = QualificationLevel::all()->pluck('name', 'id');
        $regions = Region::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $townvillages = TownVillage::all()->pluck('name', 'id');
        $nationalities = Country::all()->pluck('name', 'id');
        $local_languages = LocalLanguage::all()->pluck('name', 'id');

        return view(
            'livewire.assessment-certification.new-student-registration',
            compact(
                'institutions',
                'programmes',
                'levels',
                'regions',
                'districts',
                'townvillages',
                'nationalities',
                'local_languages'
            )
        )
            ->extends('layouts.admin');
    }

    public function updatedProgrammeLevelId($value)
    {
        if ($this->programme_id == null) {
            $this->is_error = true;
            $this->error_msg = "Please select a programme before selecting a level!";
            $this->hide_unit_standards = true;
        } else {
            $this->unit_standards = UnitStandard::where('qualification_id', $this->programme_id)
                ->whereHas('qualification', function (Builder $query) {
                    $query->where('qualification_level_id', $this->programme_level_id);
                })
                ->get();
            if ($this->unit_standards->isEmpty()) {
                $this->hide_unit_standards = true;
                $this->is_error = true;
                $this->error_msg = "No Unit Standards exist for this programme under this level!";
            }
            $this->hide_unit_standards = false;
        }
    }

    public function storeStudentRegistration()
    {

        // check if student already exist
        if (
            TrainingProviderStudent::where(DB::raw('lower(firstname)'), 'like', '%' . strtolower($this->firstname) . '%')
            ->where(function ($query) {
                $query->where(DB::raw('lower(middlename)'), 'like', '%' . strtolower($this->middlename) . '%')
                    ->orWhereNull('middlename');
            })
            ->where(DB::raw('lower(lastname)'), 'like', '%' . strtolower($this->lastname) . '%')
            ->where('gender', $this->gender)
            ->where('date_of_birth', $this->date_of_birth)
            ->exists()
        ) {
            // check if student already applied for this programme under this level from this institution
            if (
                TrainingProviderStudent::where(DB::raw('lower(firstname)'), 'like', '%' . strtolower($this->firstname) . '%')
                ->where(function ($query) {
                    $query->where(DB::raw('lower(middlename)'), 'like', '%' . strtolower($this->middlename) . '%')
                        ->orWhereNull('middlename');
                })
                ->where(DB::raw('lower(lastname)'), 'like', '%' . strtolower($this->lastname) . '%')
                ->where('gender', $this->gender)
                ->where('date_of_birth', $this->date_of_birth)
                ->whereHas('studentRegistrations', function (Builder $query) {
                    $query->where('training_provider_id', $this->training_provider_id)
                        ->where('programme_id', $this->programme_id)
                        ->where('programme_level_id', $this->programme_level_id);
                })
                ->exists()
            ) {
                $this->is_error = true;
                $this->error_msg = "Duplicate Registration. You have already applied for registration from 
                this Institution under this programme and this level!";

                return;
            } else {
                $student_id = (TrainingProviderStudent::where(DB::raw('lower(firstname)'), 'like', '%' . strtolower($this->firstname) . '%')
                    ->where(function ($query) {
                        $query->where(DB::raw('lower(middlename)'), 'like', '%' . strtolower($this->middlename) . '%')
                            ->orWhereNull('middlename');
                    })
                    ->where(DB::raw('lower(lastname)'), 'like', '%' . strtolower($this->lastname) . '%')
                    ->where('gender', $this->gender)
                    ->where('date_of_birth', $this->date_of_birth)
                    ->get())->id;

                StudentRegistrationDetail::create([
                    'student_id' => $student_id,
                    'training_provider_id' => $this->training_provider_id,
                    'programme_id' => $this->programme_id,
                    'programme_level_id' => $this->programme_level_id,
                    'academic_year' => $this->academic_year,
                    'candidate_type' => $this->candidate_type,
                    'registration_status' => 'Approved',
                    'unit_standards' => json_encode($this->student_unit_standards),
                    'registration_date' => now(),
                ]);
            }
        } else {
            DB::transaction(function () {
                if ($this->picture) {
                    $picture = $this->picture->store('uploads');
                    $this->is_picture_uploaded = true;
                } else {
                    $this->is_picture_uploaded = false;
                }
                $newstudent = TrainingProviderStudent::create([
                    'training_provider_id' => $this->training_provider_id,
                    'firstname' => $this->firstname,
                    'middlename' => $this->middlename,
                    'lastname' => $this->lastname,
                    'gender' => $this->gender,
                    'date_of_birth' => $this->date_of_birth,
                    'nationality' => $this->nationality,
                    'local_language' => $this->local_language,
                    'address' => $this->address,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'region_id' => $this->region_id,
                    'district_id' => $this->district_id,
                    'town_village_id' => $this->town_village_id,
                    'picture' => $this->is_picture_uploaded ? '/storage/' . $picture : null
                ]);

                StudentRegistrationDetail::create([
                    'student_id' => $newstudent->id,
                    'training_provider_id' => $this->training_provider_id,
                    'programme_id' => $this->programme_id,
                    'programme_level_id' => $this->programme_level_id,
                    'academic_year' => $this->academic_year,
                    'candidate_type' => $this->candidate_type,
                    'registration_status' => 'Approved',
                    'unit_standards' => json_encode($this->student_unit_standards),
                    'registration_date' => now(),
                ]);
            });
        }

        alert(
            'Registration Successfull',
            'Student successfuly registered',
            'success'
        );

        return redirect()->route('assessment-certification.registrations.index');
    }
}
