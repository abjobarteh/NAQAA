<?php

namespace App\Imports\ResearchDevelopment;

use App\Imports\ResearchDevelopment\Sheets\AcademicAdminStaffSheetImport;
use App\Imports\ResearchDevelopment\Sheets\InstitutiondetailsSheetImport;
use App\Imports\ResearchDevelopment\Sheets\ProgramsOfferedSheetImport;
use App\Imports\ResearchDevelopment\Sheets\StudentDetailSheetImport;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DatacollectionImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            // 'INSTITUTIONAL_DETAILS' => new InstitutiondetailsSheetImport(),
            // 'PROGRAMMES_OFFERED' => new ProgramsOfferedSheetImport(),
            // 'ACADEMIC&ADMIN_STAFF' => new AcademicAdminStaffSheetImport(),
            // 'GRADUATES' => new StudentDetailSheetImport('graduate'),
            2 => new StudentDetailSheetImport(),
        ];
    }
}
