<?php

namespace Database\Seeders;

use App\Models\ApplicationStatus;
use App\Models\LicenseStatus;
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
        $app_statuses = [
            [
                'name' => 'Approved'
            ],
            [
                'name' => 'Rejected'
            ],
            [
                'name' => 'Pending'
            ],

            [
                'name' => 'Ongoing'
            ],
        ];

        $license_statuses = [
            [
                'name' => 'Yes'
            ],
            [
                'name' => 'No'
            ],
            [
                'name' => 'Approved'
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
                'name' => 'Expired'
            ],
            [
                'name' => 'Out of Country'
            ],
        ];

        ApplicationStatus::insert($app_statuses);
        LicenseStatus::insert($license_statuses);
    }
}
