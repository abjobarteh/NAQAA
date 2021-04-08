<?php

namespace Database\Seeders;

use App\Models\QualificationLevel;
use Illuminate\Database\Seeder;

class QualificationLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = [
          [
              'name' => 'Level 1',
          ],  
          [
              'name' => 'Level 2',
          ],  
          [
              'name' => 'Level 3',
          ],  
          [
              'name' => 'Level 4',
          ],    
        ];

        QualificationLevel::insert($levels);
    }
}
