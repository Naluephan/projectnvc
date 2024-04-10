<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialSecuritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_securities')->insert([
            [
                'id' => 1,
                'emp_id' =>100,
                'social_security_type_id' =>1,
                'aprrove_status' =>1,
                'record_status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
            [
                'id' => 2,
                'emp_id' => 165,
                'social_security_type_id' =>2,
                'aprrove_status' => 2,
                'record_status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
        ]);
    }
}
