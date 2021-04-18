<?php

namespace Database\Seeders;

use App\Models\Directorate;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $directorates = Directorate::all()->pluck('name','id');

        if($directorates->isNotEmpty()){
            $directorates->each(function($directorate, $key){
                Unit::factory()->count(2)->create([
                    'directorate_id' => $key
                ]);
            });
        }
        else{

            Unit::factory()->count(5)->create();
        }


        
    }
}
