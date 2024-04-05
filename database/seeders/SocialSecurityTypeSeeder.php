<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialSecurityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_security_types')->insert([
            [
                'id' => 1,
                'social_security_type_name' => 'เงินสนับสนุน (สงเคราะห์บุตร)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
        ]);
    }
}
