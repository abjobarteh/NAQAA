<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Region;
use Carbon\Carbon;
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
        // $regions = Region::all()->pluck('name','id');

        // if($regions->isNotEmpty()){
        //     $regions->each(function($region, $id){
        //         District::factory()->create([
        //             'region_id' => $id
        //         ]);
        //     });
        // }
        // else{

        //     District::factory()->count(15)->create();
        // }

        $districts = [
            [
                'name' => 'Bakau',
                'region_id' => Region::where('name', 'Kanifing')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Banjul Central',
                'region_id' => Region::where('name', 'Banjul')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Banjul North',
                'region_id' => Region::where('name', 'Banjul')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Banjul South',
                'region_id' => Region::where('name', 'Banjul')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Serre Kunda Central',
                'region_id' => Region::where('name', 'Kanifing')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Central Baddibu',
                'region_id' => Region::where('name', 'Lower River Region')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Foni Bintang',
                'region_id' => Region::where('name', 'Westcoast Region')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Foni Bondali',
                'region_id' => Region::where('name', 'Westcoast Region')->get()[0]->id,
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
                'name' => 'Jarra East',
                'region_id' => Region::where('name', 'North Bank Region')->get()[0]->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        District::insert($districts);
    }
}
