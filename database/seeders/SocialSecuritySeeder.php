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
        DB::table('social_securities_histories')->insert([
            [
                'id' => 1,
                'emp_id' =>999,
                'social_security_type_id' =>1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
        ]);
    }
}
