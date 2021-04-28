<?php

namespace Database\Seeders;

use App\Models\LocalGovermentAreas;
use App\Models\Region;
use Illuminate\Database\Seeder;

class LocalGovermentAreaTableSeeder extends Seeder
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
                LocalGovermentAreas::factory()->create([
                    'region_id' => $id
                ]);
            });
        }
        else{

            LocalGovermentAreas::factory()->count(5)->create();
        }

       
    }
}
