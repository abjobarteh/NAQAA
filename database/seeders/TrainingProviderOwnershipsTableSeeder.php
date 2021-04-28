<?php

namespace Database\Seeders;

use App\Models\TrainingProviderOwnership;
use Illuminate\Database\Seeder;

class TrainingProviderOwnershipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TrainingProviderOwnership::factory()->count(5)->create();
    }
}
