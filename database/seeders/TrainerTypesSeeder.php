<?php

namespace Database\Seeders;

use App\Models\RegistrationAccreditation\TrainerType;
use Illuminate\Database\Seeder;

class TrainerTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trainer_types = [
            [
                'name' => 'Trainer',
                'slug' => 'trainer',
            ],
            [
                'name' => 'Assessor',
                'slug' => 'assessor',
            ],
            [
                'name' => 'Verifier',
                'slug' => 'verifier',
            ],
            [
                'name' => 'Practical Trainer',
                'slug' => 'practical_trainer',
            ],
        ];

        TrainerType::insert($trainer_types);
    }
}
