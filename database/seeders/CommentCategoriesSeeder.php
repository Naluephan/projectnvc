<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CommentCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment_categories')->insert(array (
            0 =>
            array (
                'id' => 1,
                'categories_comment_name' => 'กิจกรรม',
            ),
            1 =>
            array (
                'id' => 2,
                'categories_comment_name' => 'การทำงาน',
            ),
            2 =>
            array (
                'id' => 3,
                'categories_comment_name' => 'ปัญหาที่พบในบริษัท',
            ),
            3 =>
            array (
                'id' => 4,
                'categories_comment_name' => 'อุปกรณ์การใช้งาน',
            ),
            4 =>
            array (
                'id' => 5,
                'categories_comment_name' => 'สวัสดิการ',
            ),
            5 =>
            array (
                'id' => 6,
                'categories_comment_name' => 'อื่นๆ',
            )
        ));
    }
}
