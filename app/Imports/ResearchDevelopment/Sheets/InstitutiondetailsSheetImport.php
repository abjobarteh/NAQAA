<?php

namespace App\Imports\ResearchDevelopment\Sheets;

use App\Models\District;
use App\Models\LocalGovermentAreas;
use App\Models\ResearchDevelopment\InstitutionDetailsDataCollection;
use App\Models\TrainingProviderClassification;
use App\Models\TrainingProviderOwnership;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InstitutiondetailsSheetImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $ownership = TrainingProviderOwnership::firstWhere('name',$row['ownership']);
        // $classification = TrainingProviderClassification::firstWhere('name',$row['classification']);
        // $district = District::firstWhere('name', $row['district']);
        // $lga = LocalGovermentAreas::firstWhere('name',$row['local_goverment_area']);
        return new InstitutionDetailsDataCollection([
            'training_providetr_name' => $row['learning_center_name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
            'address' => $row['address'],
            'po_box' => $row['po_box'],
            'webiste' => $row['website'],
            'financial_source' => $row['financial_source'],
            'estimated_yearly_turnover' => $row['estimated_yearly_turnover_in_gmd'],
            'enrollment_capacity' => $row['enrolment_capacity'],
            'no_of_lecture_rooms' => $row['no_of_lecture_rooms'],
            'no_of_computer_labs' => $row['number_of_computer_labs'],
            'total_no_of_computers_in_labs' => $row['total_number_of_computers_in_computer_labs'],
            'ownership_id' => 3,
            'classification_id' => 3,
            'district_id' => 3,
            'lga_id' => 3,
        ]);
    }
}
