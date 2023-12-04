<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('123456');
        \DB::table('users')->delete();

        \DB::table('users')->insert([
            [
                'email' => 'admin@ehr.com',
                'username' => 'admin',
                'nick_name' => 'Admin',
                'title_id' =>   1,
                'company_id' =>   1,
                'role_id' =>   1,
                'first_name' => 'Admin',
                'last_name' => 'HR',
                'password' => $password,
            ],
        ]);
    }
}
