<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NewsNoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_notices')->insert([
            [
                'news_notice_name' => 'วันนี้ไม่ต้องสวดมนต์',
                'news_notice_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'notice_category_id' => 2,
                'news_priority' => 2,
                'record_status' => 1,
            ],
            [
                'news_notice_name' => 'กิจกรรมสิ้นปี',
                'news_notice_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'notice_category_id' => 1,
                'news_priority' => 1,
                'record_status' => 1,
            ]

        ]);
    }
}
