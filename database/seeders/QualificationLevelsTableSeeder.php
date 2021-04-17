<?php

namespace Database\Seeders;

use App\Models\QualificationLevel;
use Illuminate\Database\Seeder;

class QualificationLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       QualificationLevel::factory()->count(10)->create();
    }
}
