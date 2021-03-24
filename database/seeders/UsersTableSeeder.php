<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $systemadmin = [
            'username' => 'techjobis',
            'email' => 'techjobis@gmail.com',
            'password' => bcrypt('Allah123'),
            'firstname' => 'Biran',
            'lastname' => 'Jobe',
            'phonenumber' => '2952173',
            'address' => 'Bundung Borehole',
            'gender' => 'male',
            'default_password_status' => 1,
            'user_status' => 1,
        ];

        User::insert($systemadmin);
    }
}
