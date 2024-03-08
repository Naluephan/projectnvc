<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_categories')->insert([
            [
                'name_category' => 'กิจกรรม',
                'record_status' => 1,
            ],
            [
                'name_category' => 'ข่าวสาร',
                'record_status' => 1,
            ]
        ]);
    }
}