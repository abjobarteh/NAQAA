<?php

namespace Database\Seeders;

use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'sysadmin',
                'slug' => 'sysadmin',
                'role_level' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chief Executive Officer',
                'slug' => 'ceo',
                'role_level' => 'ceo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Director Quality Assurance',
                'slug' => 'director_quality_assurance',
                'role_level' => 'director',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Director of Research and Development',
                'slug' => 'director_of_research_and_development',
                'role_level' => 'director',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Qualifications Verifications and Evaluation Manager',
                'slug' => 'qualifications_verification_and_evaluation_manager',
                'role_level' => 'manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Qualifications Verifications and Evaluation Officer',
                'slug' => 'qualifications_verification_and_evaluation_officer',
                'role_level' => 'officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Standards Development Manager',
                'slug' => 'standards_development_manager',
                'role_level' => 'manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Standards Development Officer',
                'slug' => 'satndards_development_officer',
                'role_level' => 'officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Apprenticeship and Industrial Training Manager',
                'slug' => 'apprenticeship_and_industrial_training_manager',
                'role_level' => 'manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Apprenticeship and Industrial Training Officer',
                'slug' => 'apprenticeship_and_industrial_training_officer',
                'role_level' => 'officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Assessment and Certification Manager',
                'slug' => 'assessment_and_certification_manager',
                'role_level' => 'manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Assessment and Certification Officer',
                'slug' => 'assessment_and_certification_officer',
                'role_level' => 'officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'IT Manager',
                'slug' => 'IT_manager',
                'role_level' => 'manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'IT Officer',
                'slug' => 'IT_officer',
                'role_level' => 'officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Research and Development Manager',
                'slug' => 'research_and_development_manager',
                'role_level' => 'manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Research and Development Officer',
                'slug' => 'research_and_development_officer',
                'role_level' => 'officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Labour Market Information Manager',
                'slug' => 'labour_market_information_manager',
                'role_level' => 'manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Labour Market Information Officer',
                'slug' => 'labour_market_information_officer',
                'role_level' => 'officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Curriculum Development Manager',
                'slug' => 'curriculum_develoment_manager',
                'role_level' => 'manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Curriculum Development Officer',
                'slug' => 'curriculum_develoment_officer',
                'role_level' => 'officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Registration and Accreditation Manager',
                'slug' => 'registration_and_accreditation_manager',
                'role_level' => 'manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Registration and Accreditation Officer',
                'slug' => 'registration_and_accreditation_officer',
                'role_level' => 'officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        
        Role::insert($roles);
    }
}
