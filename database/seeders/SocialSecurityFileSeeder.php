<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialSecurityFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_security_files')->insert([
            [
                'id' => 1,
                'social_file_attach' => 'zxcghjkl;.pdf',
                'social_type_id' =>1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
            [
                'id' => 2,
                'social_file_attach' => 'sdfghjk;.pdf',
                'social_type_id' =>1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
        ]);
    }
}
