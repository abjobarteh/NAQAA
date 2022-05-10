<?php

namespace App\Imports\ResearchDevelopment\Sheets;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\ResearchDevelopment\AcademicAdminStaffDataCollection;

class AcademicAdminStaffSheetImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AcademicAdminStaffDataCollection([
            'firstname' => $row['firstname'],
            'middlename' => $row['middlename'],
            'lastname' => $row['firstname'],
            'gender' => $row['gender'],
            // 'qaulifications' => explode($row['highestqualification'],','),
            'highest_qualification' => $row['highestqualification'],
            'specialisation' => $row['specialisation'],
            'main_teaching_field_of_study' => $row['main_teaching_field_of_study'],
            // 'secondary_teaching_fields_of_study' => explode($row['secondary_teaching_fields_of_study'],','),
            'secondary_teaching_fields_of_study' => $row['secondary_teaching_fields_of_study'],
            'rank_id' => 8,
            'role_id' => 2,
            'institution_id' => 2,
        ]);
    }
}
