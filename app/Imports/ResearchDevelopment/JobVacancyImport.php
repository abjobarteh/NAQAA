<?php

namespace App\Imports\ResearchDevelopment;

use App\Models\Region;
use App\Models\ResearchDevelopment\JobVacancy;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JobVacancyImport implements ToModel, WithHeadingRow
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        return new JobVacancy([
            'position_advertised' => $row['position_advertised'],
            'minimum_required_job_experience' => $row['minimum_required_length_of_relevant_job_experience'],
            'minimum_required_qualification' => $row['minimum_level_of_qualification_required'],
            'fields_of_study' => [$row['fields_of_study']],
            'job_status' => $row['job_status'],
            'institution' => $row['institution'],
            'region_id' => Region::where('name', $row['job_location'])->get()[0]->id,
        ]);
    }
}
