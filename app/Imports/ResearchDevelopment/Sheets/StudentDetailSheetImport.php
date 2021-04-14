<?php

namespace App\Imports\ResearchDevelopment\Sheets;

use App\Models\ResearchDevelopment\StudentDetailsDataCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentDetailSheetImport implements ToModel
{
    private $studentdetail_type;

    public function __construct($studentdetail_type)
    {
        $this->studentdetail_type = $studentdetail_type;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StudentDetailsDataCollection([
            'student_id' => $row['student_id'],
            'firstname' => $row['firstname'],
            'middlename' => $row['middlename'],
            'lastname' => $row['lastname'],
            'gender' => $row['gender'],
            'phone' => $row['phone'],
            'nationality' => $row['nationality'],
            'ethnicity' => $row['ethnicity'],
            'date_of_birth' => $row['dob'],
            'programme' => $row['programme'],
            'attendance_status' => $row['attendance_status'],
            'admission_date' => $row['admission_date'],
            'completion_date' => $row['completion_date'],
            'qualification_at_entry' => 6,
            'award' => 6,
            'education_field_id' => 10,
            'institution_id' => 2,
            'studentdetail_type' =>$this->studentdetail_type,
        ]);
    }
}
