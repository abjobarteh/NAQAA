<?php

namespace Database\Seeders;

use App\Models\TrainingProviderClassification;
use App\Models\TrainingProviderOwnership;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TrainingProviderClassificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TrainingProviderClassification::factory()->count(3)->create();
        // TrainingProviderOwnership::factory()->count(3)->create();

        $classifications = [
            [
                'name' => 'Higher Education',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tertiary Education',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Post Secondary Non Tertiary',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        $ownerships = [
            [
                'name' => 'Private',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Public',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'NGO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];

        TrainingProviderClassification::insert($classifications);
        TrainingProviderOwnership::insert($ownerships);
    }
}
