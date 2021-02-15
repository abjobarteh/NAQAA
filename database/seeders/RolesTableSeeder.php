<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => 1,
                'name' => 'systemadmin',
                'slug' => 'systemadmin'
            ],
            [
                'id' => 2,
                'name' => 'CEO',
                'slug' => 'ceo'
            ],
            [
                'id' => 3,
                'name' => 'Director quality assurance',
                'slug' => 'director_quality_assurance'
            ],
            [
                'id' => 4,
                'name' => 'Director admin finance',
                'slug' => 'director_admin_finance'
            ],
            [
                'id' => 5,
                'name' => 'Director research development',
                'slug' => 'director_research_development'
            ],
        ];
        
        Role::insert($roles);
    }
}
