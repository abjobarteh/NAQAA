<?php

namespace Database\Seeders;

use App\Models\LocalGovermentAreas;
use App\Models\Region;
use Carbon\Carbon;
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
        // $regions = Region::all()->pluck('name','id');

        // if($regions->isNotEmpty()){
        //     $regions->each(function($region, $id){
        //         LocalGovermentAreas::factory()->create([
        //             'region_id' => $id
        //         ]);
        //     });
        // }
        // else{

        //     LocalGovermentAreas::factory()->count(5)->create();
        // }

        $localgoverment_areas = [
            [
                'name' => 'Banjul',
                'region_id' => Region::where('name', 'Banjul')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kanifing',
                'region_id' => Region::where('name', 'Kanifing')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Brikama',
                'region_id' => Region::where('name', 'Westcoast Region')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kerewan',
                'region_id' => Region::where('name', 'North Bank Region')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kuntaur',
                'region_id' => Region::where('name', 'Lower River Region')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Janjanbureh',
                'region_id' => Region::where('name', 'Central River Region')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mansakonko',
                'region_id' => Region::where('name', 'Lower River Region')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Basse',
                'region_id' => Region::where('name', 'Upper River Region')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        LocalGovermentAreas::insert($localgoverment_areas);
    }
}
