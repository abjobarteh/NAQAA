<?php

namespace App\Imports\ResearchDevelopment\Sheets;

use App\Models\EducationField;
use App\Models\QualificationLevel;
use App\Models\RegistrationAccreditation\TrainingProvider;
use App\Models\TrainingProviderStudent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentDetailSheetImport implements ToModel, WithHeadingRow
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (!isset($row['first_name'])) {
            return null;
        }
        $training_provider = TrainingProvider::where('login_id', auth()->user()->id)->get();

        $student_exist = TrainingProviderStudent::where('firstname', 'like', '%' . $row['first_name'] . '%')
            ->where('middlename', 'like', '%' . $row['middlename'] . '%')
            ->where('lastname', 'like', '%' . $row['lastname'] . '%')
            ->where('gender', 'like', '%' . $row['gender'] . '%')
            // ->where('date_of_birth', 'like', '%' . $row['dob'] . '%')
            ->where('training_provider_id', $training_provider[0]->id)
            ->exists();

        if (!$student_exist) {
            $qualification_at_entry = QualificationLevel::where('name', 'like', '%' . $row['qualification_at_entry'] . '%')->get();
            $award = QualificationLevel::where('name', 'like', '%' . $row['award'] . '%')->get();
            $field_of_education = EducationField::where('name', 'like', '%' . $row['field_of_education'] . '%')->get();

            return new TrainingProviderStudent([
                'firstname' => $row['first_name'],
                'middlename' => $row['middlename'],
                'lastname' => $row['lastname'],
                'gender' => $row['gender'],
                'nationality' => $row['nationality'],
                // 'date_of_birth' => str_replace('/', '-', $row['dob']),
                'phone' => $row['phone'],
                'programme_name' => $row['programme_name'],
                'attendance_status' => $row['attendance_status'],
                // 'admission_date' => $row['admission_date'],
                // 'completion_date' => $row['completion_date'],
                'qualification_at_entry' => $qualification_at_entry[0]->id ?? '',
                'award' => $award[0]->id ?? '',
                'education_field_id' => $field_of_education[0]->id ?? '',
                'training_provider_id' => $training_provider[0]->id ?? '',
            ]);
        } else {
            return null;
        }
    }
}
