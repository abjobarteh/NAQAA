<?php

namespace App\Imports\ResearchDevelopment\Sheets;

use App\Models\Program;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\TrainingProviderProgramme;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\ResearchDevelopment\ProgramDetailsDataCollection;


class ProgramsOfferedSheetImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
      $row['programme_id'] = Program::where('name', 'like', '%'.$row['programme_id'].'%')->first()->id;
      $program_id = TrainingProviderProgramme::where('programme_id',$row['programme_id'])->first()->id;

      return new ProgramDetailsDataCollection([
          'programme_id' => $program_id,
          'duration' => $row['duration'],
          'tuition_fee_per_year' => $row['tuition_fee_per_year'],
          'entry_requirements' => array($row['entry_requirements']),
          'awarding_body' => $row['awarding_body'],
          'academic_year' => $row['academic_year'],
          'import_id' => $row['import_id'],
      ]);
    }
}
