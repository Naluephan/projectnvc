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
                'company_id' =>3,
                'position_id' =>39,
                'department_id' =>26,
                'aprrove_status' =>1,
                'record_status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
            [
                'id' => 2,
                'emp_id' => 165,
                'social_security_type_id' =>2,
                'company_id' =>1,
                'position_id' =>60,
                'department_id' =>38,
                'aprrove_status' => 2,
                'record_status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
        ]);
    }
}
