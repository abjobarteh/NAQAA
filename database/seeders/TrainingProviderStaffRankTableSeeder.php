<?php

namespace Database\Seeders;

use App\Models\TrainingProviderStaffsRank;
use Illuminate\Database\Seeder;

class TrainingProviderStaffRankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TrainingProviderStaffsRank::factory()->count(3)->create();
    }
}
