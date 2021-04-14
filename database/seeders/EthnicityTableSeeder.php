<?php

namespace Database\Seeders;

use App\Models\Ethnicity;
use Illuminate\Database\Seeder;

class EthnicityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ethnicities = [
            [
                'name' => 'Aku'
            ],
            [
                'name' => 'Fula'
            ],
            [
                'name' => 'Jola'
            ],
            [
                'name' => 'Mandinka'
            ],
            [
                'name' => 'Manjago'
            ],
            [
                'name' => 'Sarahule'
            ],
            [
                'name' => 'Serere'
            ],
            [
                'name' => 'Tukulor'
            ],
            [
                'name' => 'Wollof'
            ],
            [
                'name' => 'Other'
            ],
        ];

        Ethnicity::insert($ethnicities);
    }
}
