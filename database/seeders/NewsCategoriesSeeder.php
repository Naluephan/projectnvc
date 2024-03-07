<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NewsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_categories')->insert([
            'news_id' => 1,
            'news_name' => 'news1',
            'news_details' => 'news1Details news1Details',
        ]);
    }
}
