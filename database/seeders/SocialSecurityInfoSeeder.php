<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SocialSecurityInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('social_security_infos')->insert([
            [
                'id' => 1,
                'social_security_file' =>1,
                'social_security_id' =>1,
                'doc_name' => 'asdfghjbksdzfxg',
                'doc_file' => 'vfdbdbsdvddgrdgrrrrrrr.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
            [
                'id' => 2,
                'social_security_file' => 2,
                'social_security_id' =>1,
                'doc_name' => 'sdzfghjkxdfgch',
                'doc_file' => 'dzxfdgh.pdf',
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
        ]);
    }
}
