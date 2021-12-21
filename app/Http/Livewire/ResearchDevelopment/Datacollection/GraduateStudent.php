<?php

namespace App\Http\Livewire\ResearchDevelopment\Datacollection;

use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TrainingProviderStudent;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GraduateStudent extends Component
{
    public $training_provider_id, $firstname, $middlename, $lastname, $gender, $programme,
        $award_id, $admission_year;
    public $students, $graduate_student, $graduation_date;
    public $studentsExist, $is_error = false, $is_success = false, $message;

    protected $listeners = [
        'openGraduationDateForm' => 'showGraduationDateFormModal',
        'refreshGraduateStudent' => '$refresh'
    ];
    protected $rules = [
        'training_provider_id' => 'required|numeric',
        'firstname' => 'nullable|string',
        'middlename' => 'nullable|string',
        'lastname' => 'nullable|string',
        'gender' => 'required_with:firstname,lastname|nullable|string',
        'programme' => 'required|string',
        'award_id' => 'required|numeric',
        'admission_year' => 'required|numeric'
    ];
    public function render()
    {
        $trainingproviders = TrainingProvider::all()->pluck('name', 'id');
        $levels  = QualificationLevel::all()->pluck('name', 'id');
        return view(
            'livewire.research-development.datacollection.graduate-student',
            compact('trainingproviders', 'levels')
        )
            ->extends('layouts.admin');
    }

    public function getStudents()
    {
        // dd('searching for students of this parameters.....');
        $this->validate();

        if (
            $this->firstname == null &&
            $this->lastname == null
        ) {
            $this->students = TrainingProviderStudent::where('training_provider_id', $this->training_provider_id)
                ->where(DB::raw('lower(programme_name)'), 'like', '%' . strtolower($this->programme) . '%')
                ->where('award', $this->award_id)
                ->whereYear('admission_date', $this->admission_year)
                ->get();
        } else if (
            $this->firstname != null &&
            $this->lastname == null
        ) {
            $this->students = TrainingProviderStudent::where('training_provider_id', $this->training_provider_id)
                ->where(DB::raw('lower(firstname)'), 'like', '%' . strtolower($this->firstname) . '%')
                ->where('gender', $this->gender)
                ->where(DB::raw('lower(programme_name)'), 'like', '%' . strtolower($this->programme) . '%')
                ->where('award', $this->award_id)
                ->whereYear('admission_date', $this->admission_year)
                ->get();
        } else if (
            $this->firstname == null &&
            $this->lastname != null
        ) {
            $this->students = TrainingProviderStudent::where('training_provider_id', $this->training_provider_id)
                ->where(DB::raw('lower(lastname)'), 'like', '%' . strtolower($this->lastname) . '%')
                ->where('gender', $this->gender)
                ->where(DB::raw('lower(programme_name)'), 'like', '%' . strtolower($this->programme) . '%')
                ->where('award', $this->award_id)
                ->whereYear('admission_date', $this->admission_year)
                ->get();
        } else {
            $this->students = TrainingProviderStudent::where('training_provider_id', $this->training_provider_id)
                ->where(DB::raw('lower(firstname)'), 'like', '%' . strtolower($this->firstname) . '%')
                ->where(function ($query) {
                    $query->where(DB::raw('lower(middlename)'), 'like', '%' . strtolower($this->middlename) . '%')
                        ->orWhereNull('middlename');
                })
                ->where(DB::raw('lower(lastname)'), 'like', '%' . strtolower($this->lastname) . '%')
                ->where('gender', $this->gender)
                ->where(DB::raw('lower(programme_name)'), 'like', '%' . strtolower($this->programme) . '%')
                ->where('award', $this->award_id)
                ->whereYear('admission_date', $this->admission_year)
                ->get();
        }

        // check if results is empty
        if ($this->students->isEmpty()) {
            return $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'title' => 'Empty Results',
                'message' => 'No Students exist under these parameters!'
            ]);
        }
        $this->studentsExist = true;
    }

    public function showGraduationDateFormModal($id)
    {
        $this->graduate_student = TrainingProviderStudent::findOrFail($id);

        if (!is_null($this->graduate_student)) {
            $this->fill([
                'graduation_date' => $this->graduate_student->graduation_date,
            ]);
        }

        $this->dispatchBrowserEvent('openGraduationDateModal');
    }

    public function closeGraduationDateForm()
    {
        $this->reset([
            'graduate_student',
            'graduation_date'
        ]);

        $this->dispatchBrowserEvent('closeGraduationDateModal');
    }

    public function saveStudentGraduationDate()
    {
        $this->graduate_student->update([
            'graduation_date' => $this->graduation_date
        ]);

        $this->emit('refreshGraduateStudent');
        $this->closeGraduationDateForm();

        return $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Graduation date is successfully saved!'
        ]);
    }
}
