<?php

namespace App\Imports\ResearchDevelopment\Sheets;

use App\Models\ResearchDevelopment\ProgramDetailsDataCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProgramsOfferedSheetImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ProgramDetailsDataCollection([
            // 'program_name' => $row['program_name'],
            // 'duration' => $row['duration_months'],
            // 'tutition_fee_per_year' => $row['tuition_fee_gmd_per_year'],
            // 'entry_requirements' => explode($row['entry_requirements'], ','),
            // 'awarding_body' => $row['awarding_body'],
            // 'education_field_id' => 3,
            // 'institution_detail_id' => 1,
            'programme_id' => $row['programme_id'],
            'duration' => $row['duration'],
            'tutition_fee_per_year' => $row['tuition_fee_per_year'],
            'entry_requirements' => $row['entry_requirements'],
            'awarding_body' => $row['awarding_body'],
            'academic_year' => $row['academic_year'],
        ]);
    }
}
