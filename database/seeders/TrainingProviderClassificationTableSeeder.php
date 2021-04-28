<?php

namespace Database\Seeders;

use App\Models\TrainingProviderClassification;
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
        TrainingProviderClassification::factory()->count(3)->create();
    }
}
