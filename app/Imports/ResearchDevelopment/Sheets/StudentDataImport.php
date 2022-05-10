<?php
namespace App\Imports\ResearchDevelopment\Sheets;

use App\Models\EducationField;
use App\Models\QualificationLevel;
use App\Models\TrainingProviderStudent;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\RegistrationAccreditation\TrainingProvider;

class StudentDataImport implements ToModel, WithHeadingRow
{
  /**
  *@param array $row
  *@return \Illuminate\Database\Eloquent\Model\null
  */
  public function model(array $row)
  { 
    //gets the foreign key id of the instituion detail from the excell sheet
    $institutionId = TrainingProvider::where('name', 'like', '%'.$row['learning_centre_name'].'%')->first()->id; 

    //checks weather the student exists in the database
    $student_exist = TrainingProviderStudent::where('firstname', 'like', '%' . $row['first_name'] . '%')
      ->where(function ($query) use ($row) {
          $query->where('middlename', 'like', '%' . $row['middlename'] . '%')
              ->orWhereNull('middlename');
      })
      ->where('lastname', 'like', '%' . $row['lastname'] . '%')
      ->where('gender', 'like', '%' . $row['gender'] . '%')
      // ->where('date_of_birth', 'like', '%' . $row['dob'] . '%')
      ->where('training_provider_id', $institutionId)
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
            'programme_name' => $row['programme'],
            'attendance_status' => $row['attendance_status'],
            // 'admission_date' => $row['admission_date'],
            // 'completion_date' => $row['completion_date'],
            'qualification_at_entry' => $qualification_at_entry[0]->id ?? null,
            'award' => $award[0]->id ?? null,
            'education_field_id' => $field_of_education[0]->id ?? null,
            'training_provider_id' => $institutionId ?? null,
        ]);
    } else {
        return null;
    }
  }  
}

?>