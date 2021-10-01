<?php

namespace Database\Seeders;

use App\Models\ApplicationStatus;
use Illuminate\Database\Seeder;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'name' => 'Yes'
            ],
            [
                'name' => 'No'
            ],
            [
                'name' => 'Not Approved'
            ],
            [
                'name' => 'Revoked'
            ],
            [
                'name' => 'Voluntary Closure'
            ],
            [
                'name' => 'Permanent Closure'
            ],
            [
                'name' => 'Rejected'
            ],
            [
                'name' => 'Pending'
            ],
            [
                'name' => 'Approved'
            ],
            [
                'name' => 'Expired Licence'
            ],
            [
                'name' => 'Ongoing'
            ],
        ];

        ApplicationStatus::insert($statuses);
    }
}
