<?php

namespace Database\Seeders;

use App\Models\ApplicationType;
use Illuminate\Database\Seeder;

class ApplicationTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $application_types = [
            [
                'name' => 'institution_registration',
                'fee' => 650
            ],
            [
                'name' => 'institution_letter_of_interim_authorisation',
                'fee' => 650
            ],
            [
                'name' => 'institution_accreditation',
                'fee' => 350
            ],
            [
                'name' => 'institution_programme_accreditation',
                'fee' => 150
            ],
            [
                'name' => 'trainer_registration',
                'fee' => 250
            ],
            [
                'name' => 'trainer_accreditation',
                'fee' => 250
            ],
            [
                'name' => 'trainer_programme_accreditation',
                'fee' => 100
            ],
        ];

        ApplicationType::insert($application_types);
    }
}
