<?php

namespace Database\Seeders;

use App\Models\TrainingProviderStaffsRank;
use Carbon\Carbon;
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
        // TrainingProviderStaffsRank::factory()->count(3)->create();

        $ranks = [
            [
                'name' => 'Professor',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
    }
}
