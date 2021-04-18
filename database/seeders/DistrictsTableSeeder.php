<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Region;
use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = Region::all()->pluck('name','id');

        if($regions->isNotEmpty()){
            $regions->each(function($region, $id){
                District::factory()->create([
                    'region_id' => $id
                ]);
            });
        }
        else{

            District::factory()->count(15)->create();
        }

    }
}
