<?php

namespace App\Http\Livewire\ResearchDevelopment\Datacollection;

use App\Imports\ResearchDevelopment\DatacollectionImport;
use App\Models\RegistrationAccreditation\TrainingProvider;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class StudentDetailsImport extends Component
{
    use WithFileUploads;

    public $excel_file, $learning_center;
    public $batchId;
    public $importing = false;
    public $importFinished = false;


    public function render()
    {
        $learningcenters = TrainingProvider::all()->pluck('name', 'id');

        return view('livewire.research-development.datacollection.student-details-import', compact('learningcenters'))
            ->extends('layouts.admin');
    }

    public function importData()
    {
        // $this->validate([
        //     'excel_file' => 'required|mimes:xlsx,xls,csv'
        // ]);

        // dd((new HeadingRowImport())->toArray($this->excel_file));

        Excel::import(new DatacollectionImport($this->learning_center), $this->excel_file);

        alert('Import Successfully', 'Student details successfully imported', 'success');
    }
}
