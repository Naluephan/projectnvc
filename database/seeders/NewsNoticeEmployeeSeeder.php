<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NewsNoticeEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_notice_employees')->insert([
            [
                'news_notice_id' => 1,
                'emp_id' => 1,
            ],
            [
                'news_notice_id' => 1,
                'emp_id' => 2,
            ],
            [
                'news_notice_id' => 1,
                'emp_id' => 3,
            ],
            [
                'news_notice_id' => 1,
                'emp_id' => 4,
            ],
            [
                'news_notice_id' => 1,
                'emp_id' => 5,
            ],
            [
                'news_notice_id' => 2,
                'emp_id' => 1,
            ],
            [
                'news_notice_id' => 2,
                'emp_id' => 2,
            ],
            [
                'news_notice_id' => 2,
                'emp_id' => 3,
            ],
            [
                'news_notice_id' => 2,
                'emp_id' => 4,
            ],
            [
                'news_notice_id' => 2,
                'emp_id' => 5,
            ],

        ]);
    }
}
