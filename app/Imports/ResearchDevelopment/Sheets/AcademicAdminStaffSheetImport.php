<?php

namespace App\Imports\ResearchDevelopment\Sheets;

use App\Models\ResearchDevelopment\AcademicAdminStaffDataCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class AcademicAdminStaffSheetImport implements ToModel
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
            'qaulifications' => explode($row['qualifications'],','),
            'specialisation' => $row['specialisation'],
            'main_teaching_field_of_study' => $row['main_teaching_field_of_study'],
            'secondary_teaching_fields_of_study' => explode($row['secondary_teaching_fields_of_study'],','),
            'rank_id' => 8,
            'role_id' => 2,
            'institution_id' => 2,
        ]);
    }
}
