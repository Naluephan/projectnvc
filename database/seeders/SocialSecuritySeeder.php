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
                'emp_id' =>999,
                'social_security_type_id' =>1,
                'social_security_type_name' =>'เงินสนับสนุน (สงเคราะห์บุตร)',
                'company_id' =>3,
                'position_id' =>39,
                'department_id' =>26,
                'approve_status' =>1,
                'record_status' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
        ]);
    }
}
