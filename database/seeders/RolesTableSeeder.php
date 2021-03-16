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
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chief Exwcutive Officer',
                'slug' => 'ceo',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Director Quality Assurance',
                'slug' => 'director_quality_assurance',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Director of Administration',
                'slug' => 'director_of_administration',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Director of Finance',
                'slug' => 'director_of_finance',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Director of Research and Development',
                'slug' => 'director_of_research_and_development',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Qualifications Verifications and Evaluation Manager',
                'slug' => 'qualifications_verification_and_evaluation_manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Qualifications Verifications and Evaluation Officer',
                'slug' => 'qualifications_verification_and_evaluation_officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Monitoring and Evaluation Manager',
                'slug' => 'monitoring_and_evalution_manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Monitoring and Evaluation Officer',
                'slug' => 'monitoring_and_evalution_officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Standards Development Manager',
                'slug' => 'standards_development_manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Standards Development Officer',
                'slug' => 'satndards_development_officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Apprenticeship and Industrial Training Manager',
                'slug' => 'apprenticeship_and_industrial_training_manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Apprenticeship and Industrial Training Officer',
                'slug' => 'apprenticeship_and_industrial_training_officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Assessment and Certification Manager',
                'slug' => 'assessment_and_certification_manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Assessment and Certification Officer',
                'slug' => 'assessment_and_certification_officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Admin Manager',
                'slug' => 'admin_manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Admin Officer',
                'slug' => 'admin_offficer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'IT Manager',
                'slug' => 'IT_manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'IT Officer',
                'slug' => 'IT_officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Records Supervisor',
                'slug' => 'records_supervisor',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Research and Development Manager',
                'slug' => 'research_and_development_manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Research and Development Officer',
                'slug' => 'research_and_development_officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Labour Market Information Manager',
                'slug' => 'labour_market_information_manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Labour Market Information Officer',
                'slug' => 'labour_market_information_officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Curriculum Development Manager',
                'slug' => 'curriculum_develoment_manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Curriculum Development Officer',
                'slug' => 'curriculum_develoment_officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Registration and Accreditation Manager',
                'slug' => 'registration_and_accreditation_manager',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Registration and Accreditation Officer',
                'slug' => 'registration_and_accreditation_officer',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Senior Internal Auditor',
                'slug' => 'senior_internal_auditor',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Internal Auditor',
                'slug' => 'internal_auditor',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        
        Role::insert($roles);
    }
}
