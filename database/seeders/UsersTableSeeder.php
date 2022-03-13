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
            'username' => 'sysadmin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'firstname' => 'John',
            'lastname' => 'Doe',
            'phonenumber' => '7777777',
            'address' => 'Bakau',
            'default_password_status' => 0,
            'user_status' => 1,
            'user_category' => 'system',
        ];

        User::insert($systemadmin);
    }
}
