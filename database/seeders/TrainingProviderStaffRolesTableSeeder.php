<?php

namespace Database\Seeders;

use App\Models\TrainingProviderStaffsRole;
use Illuminate\Database\Seeder;

class TrainingProviderStaffRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TrainingProviderStaffsRole::factory()->count(3)->create();
    }
}
