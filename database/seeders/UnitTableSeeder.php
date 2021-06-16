<?php

namespace Database\Seeders;

use App\Models\Directorate;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $units = [
            [
                'name' => 'Procurement',
                'directorate_id' => Directorate::where('name', 'Office of CEO')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Internal Audit',
                'directorate_id' => Directorate::where('name', 'Office of CEO')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Public Relations',
                'directorate_id' => Directorate::where('name', 'Office of CEO')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Registration and Accreditation',
                'directorate_id' => Directorate::where('name', 'Directorate of Quality Assurance')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Assessment and Certification',
                'directorate_id' => Directorate::where('name', 'Directorate of Quality Assurance')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Standards and Curriculum Development',
                'directorate_id' => Directorate::where('name', 'Directorate of Quality Assurance')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Apprenticeship and Industrial Attachment',
                'directorate_id' => Directorate::where('name', 'Directorate of Quality Assurance')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Registration and Accreditation',
                'directorate_id' => Directorate::where('name', 'Directorate of Quality Assurance')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Labour Market Information',
                'directorate_id' => Directorate::where('name', 'Directorate of Research and Development')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Administration',
                'directorate_id' => Directorate::where('name', 'Directorate of Admin and Finance')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Finance',
                'directorate_id' => Directorate::where('name', 'Directorate of Admin and Finance')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Unit::insert($units);
    }
}
