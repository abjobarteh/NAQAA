<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = [
            [
                'name' => 'GT Bank'
            ],
            [
                'name' => 'Eco Bank'
            ],
            [
                'name' => 'Access Bank'
            ],
            [
                'name' => 'Standard Chartered Bank'
            ],
            [
                'name' => 'Bloom Bank'
            ],
            [
                'name' => 'Trust Bank'
            ],
            [
                'name' => 'Mega Bank'
            ],
        ];

        Bank::insert($banks);
    }
}
