<?php

namespace Database\Seeders;

use App\Models\RegistrationAccreditation\TrainingProviderChecklist;
use Illuminate\Database\Seeder;

class TrainingProviderChecklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $checklists = [
            [
                'name' => 'registration_license',
            ],
            [
                'name' => 'organisational_chart',
            ],
            [
                'name' => 'financial_policy',
            ],
            [
                'name' => 'audited_accounts',
            ],
            [
                'name' => 'staff_socialsecurity_receipt',
            ],
            [
                'name' => 'institutional_tin',
            ],
            [
                'name' => 'health_inspectors_certificate',
            ],
            [
                'name' => 'budget_estimate',
            ],
            [
                'name' => 'last_three_month_account_statement',
            ],
            [
                'name' => 'fees_policy',
            ],
            [
                'name' => 'student_code_of_conduct',
            ],
            [
                'name' => 'sample_student_record',
            ],
            [
                'name' => 'staff_policy',
            ],
            [
                'name' => 'job_descriptions',
            ],
            [
                'name' => 'staff_meeting_minutes',
            ],
            [
                'name' => 'board_meeting_minutes',
            ],
            [
                'name' => 'quality_management_systems',
            ],
            [
                'name' => 'self_evaluation_instruments',
            ],
            [
                'name' => 'performance_indicators',
            ],
            [
                'name' => 'trainer_lists',
            ],
        ];

        TrainingProviderChecklist::insert($checklists);
    }
}
