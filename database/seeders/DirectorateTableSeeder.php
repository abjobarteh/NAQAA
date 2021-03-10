<?php

namespace Database\Seeders;

use App\Models\Directorate;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DirectorateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directorates = [
            [
                'id' => 1,
                'name' => 'Office of CEO',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Directorate of Quality Assurance',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'Directorate of Research and Development',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'Directorate of Admin and Finance',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => 'Governing Council',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Directorate::insert($directorates);
    }
}
