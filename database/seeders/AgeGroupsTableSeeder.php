<?php

namespace Database\Seeders;

use App\Models\AgeGroup;
use Illuminate\Database\Seeder;

class AgeGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $age_groups = [
            [
                'group' => '15-64',
                'start_age' => '15',
                'end_age' => '64',
                'description' => 'The working age population'
            ],
            [
                'group' => '15-24',
                'start_age' => '15',
                'end_age' => '24',
                'description' => 'Those just entering the labour market foloowing education'
            ],
            [
                'group' => '25-54',
                'start_age' => '25',
                'end_age' => '54',
                'description' => 'Those in their prime working lives'
            ],
            [
                'group' => '55-64',
                'start_age' => '55',
                'end_age' => '64',
                'description' => 'Those passing the peak of their career and approaching retirement'
            ],
        ];

        // AgeGroup::insert($age_groups);
    }
}
