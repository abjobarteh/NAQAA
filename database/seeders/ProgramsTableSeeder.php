<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programs = [
            [
                'name' => 'AAT'
            ],
            [
                'name' => 'ACCA'
            ],
            [
                'name' => 'Access Programme'
            ],
            [
                'name' => 'Adult Literacy'
            ],
            [
                'name' => 'Air Cabin Crew & Airline'
            ],
            [
                'name' => 'Animal Health Production'
            ],
            [
                'name' => 'Arts & Craft'
            ],
            [
                'name' => 'Accounting'
            ],
            [
                'name' => 'Agriculture'
            ],
            [
                'name' => 'Auditing'
            ],
            [
                'name' => 'Auto Mechanics'
            ],
            [
                'name' => 'Banking & Finance'
            ],
            [
                'name' => 'Beauty Therapy'
            ],
            [
                'name' => 'Biology'
            ],
            [
                'name' => 'Building and Construction'
            ],
            [
                'name' => 'Business Management Studies'
            ],
            [
                'name' => 'Carpentry'
            ],
            [
                'name' => 'CAT'
            ],
            [
                'name' => 'CCNA'
            ],
            [
                'name' => 'Chemistry'
            ],
            [
                'name' => 'Civil Engineering'
            ],
            [
                'name' => 'Clothing & Textile'
            ],
            [
                'name' => 'Community Development'
            ],
            [
                'name' => 'Computer Hardware'
            ],
            [
                'name' => 'Computer Software'
            ],
            [
                'name' => 'Development Studies'
            ],
            [
                'name' => 'Economics'
            ],
            [
                'name' => 'Education'
            ],
            [
                'name' => 'Electrical/Electronic Engineering'
            ],
            [
                'name' => 'Environment Studies'
            ],
            [
                'name' => 'Finance'
            ],
            [
                'name' => 'Food and Nutrition'
            ],
            [
                'name' => 'Gender Studies'
            ],
            [
                'name' => 'Geography'
            ],
            [
                'name' => 'History'
            ],
            [
                'name' => 'Home Science'
            ],
            [
                'name' => 'Human Resource Development'
            ],
            [
                'name' => 'Human Resource Management'
            ],
            [
                'name' => 'International Relations'
            ],
            [
                'name' => 'Language Studies'
            ],
            [
                'name' => 'Law'
            ],
            [
                'name' => 'Literature Studies'
            ],
            [
                'name' => 'Marketing'
            ],
            [
                'name' => 'Mathematics'
            ],
            [
                'name' => 'Mechanical Engineering'
            ],
            [
                'name' => 'Media Studies'
            ],
            [
                'name' => 'Medical Technician'
            ],
            [
                'name' => 'Medicine'
            ],
            [
                'name' => 'Nursing and Midwifery'
            ],
            [
                'name' => 'Peace and Conflict Studies'
            ],
            [
                'name' => 'Physics'
            ],
            [
                'name' => 'Political Science'
            ],
            [
                'name' => 'Procurement'
            ],
            [
                'name' => 'Project Management'
            ],
            [
                'name' => 'Public Health'
            ],
            [
                'name' => 'Religious Studies'
            ],
            [
                'name' => 'Social Works'
            ],
            [
                'name' => 'Tourism and Hospitality Studies'
            ],
            [
                'name' => 'Welding & Fabrication'
            ],
            [
                'name' => 'Unspecified'
            ],
        ];

        Program::insert($programs);
    }
}
