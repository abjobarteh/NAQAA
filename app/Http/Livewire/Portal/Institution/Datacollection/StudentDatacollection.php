<?php

namespace App\Http\Livewire\Portal\Institution\Datacollection;

use App\Imports\ResearchDevelopment\DatacollectionImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class StudentDatacollection extends Component
{
    use WithFileUploads;

    public $excel_file;
    public $batchId;
    public $importing = false;
    public $importFinished = false;

    public function render()
    {
        return view('livewire.portal.institution.datacollection.student-datacollection')
            ->extends('layouts.portal');
    }

    public function importData()
    {
        // $this->validate([
        //     'excel_file' => 'required|mimes:xlsx,xls,csv'
        // ]);

        // dd($this->excel_file);
        // dd((new HeadingRowImport())->toArray($this->excel_file));

        Excel::import(new DatacollectionImport, $this->excel_file);

        alert('Import Successfully', 'Student details successfully', 'success');

        return redirect(route('portal.institution.datacollection.students.index'));
    }
}
