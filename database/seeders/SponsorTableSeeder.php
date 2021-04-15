<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Seeder;

class SponsorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            [
                'name' => 'Goverment'
            ],
            [
                'name' => 'Private'
            ],
            [
                'name' => 'NGO'
            ],
            [
                'name' => 'Other'
            ],
        ];

        Sponsor::insert($sponsors);
    }
}
