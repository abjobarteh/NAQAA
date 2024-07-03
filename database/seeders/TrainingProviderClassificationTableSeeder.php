<?php

namespace Database\Seeders;

use App\Models\TrainingProviderClassification;
use App\Models\TrainingProviderOwnership;
use App\Models\TrainingProviderCategory;
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
                'name' => 'College',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'TVET/Tertiary',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Non-TVET Tertiary',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Vocational Centre',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Apprenticeship Centre',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        $categories = [
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

        $ownerships = [
            [
                'name' => 'Sole Proprietorship',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Joint',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Community-owned',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ];

         TrainingProviderClassification::insert($classifications);
         TrainingProviderCategory::insert($categories);
         TrainingProviderOwnership::insert($ownerships);
    }
}
