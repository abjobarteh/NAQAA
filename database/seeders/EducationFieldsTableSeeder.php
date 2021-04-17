<?php

namespace Database\Seeders;

use App\Models\EducationField;
use Illuminate\Database\Seeder;

class EducationFieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $eduFields = [
        //     [
        //         'name' => 'Agriculture and Nature Conservation',
        //     ],
        //     [
        //         'name' => 'Business and Commerce',
        //     ],
        //     [
        //         'name' => 'Culture, Arts and Crafts',
        //     ],
        //     [
        //         'name' => 'Education and Training',
        //     ],
        //     [
        //         'name' => 'Engineering and Manufacturing',
        //     ],
        //     [
        //         'name' => 'Textile',
        //     ],
        //     [
        //         'name' => 'Key Skills',
        //     ],
        //     [
        //         'name' => 'Health and Social Services',
        //     ],
        //     [
        //         'name' => 'Hospitality',
        //     ],
        //     [
        //         'name' => 'Information and Communication Technology',
        //     ],
        // ];

        // EducationField::insert($eduFields);

        EducationField::factory()->count(20)->hasSubFields(20)->create();
    }
}
