<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CommentTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment_topics')->insert(array (
            0 =>
            array (
                'id' => 1,
                'categories_comment_id' => '1',
                'topic_comment_name' => 'วันสงกรานต์',
            ),
            1 =>
            array (
                'id' => 2,
                'categories_comment_id' => '2',
                'topic_comment_name' => 'เวลาทำงาน',
            ),
            2 =>
            array (
                'id' => 3,
                'categories_comment_id' => '3',
                'topic_comment_name' => 'สถานที่พักผ่อน',
            ),
            3 =>
            array (
                'id' => 4,
                'categories_comment_id' => '4',
                'topic_comment_name' => 'เครื่องมือการทำงาน',
            ),
            4 =>
            array (
                'id' => 5,
                'categories_comment_id' => '5',
                'topic_comment_name' => 'ประกัน',
            ),
            5 =>
            array (
                'id' => 6,
                'categories_comment_id' => '6',
                'topic_comment_name' => 'อื่นๆ',
            ),
            6 =>
            array (
                'id' => 7,
                'categories_comment_id' => '1',
                'topic_comment_name' => 'ทำบุญบริษัท',
            ),
            7 =>
            array (
                'id' => 8,
                'categories_comment_id' => '1',
                'topic_comment_name' => 'วันสิ้นปี/ปีใหม่',
            ),
            8 =>
            array (
                'id' => 9,
                'categories_comment_id' => '2',
                'topic_comment_name' => 'เวลาพัก',
            ),
            9 =>
            array (
                'id' => 10,
                'categories_comment_id' => '2',
                'topic_comment_name' => 'เวลาเลิกงาน',
            ),
            10 =>
            array (
                'id' => 11,
                'categories_comment_id' => '3',
                'topic_comment_name' => 'สถานที่จอดรถ',
            ),
            11 =>
            array (
                'id' => 12,
                'categories_comment_id' => '4',
                'topic_comment_name' => 'อุปกรณ์อำนวยความสะดวก',
            ),
            12 =>
            array (
                'id' => 13,
                'categories_comment_id' => '5',
                'topic_comment_name' => 'ชุดยูนิฟอร์ม',
            ),
            13 =>
            array (
                'id' => 14,
                'categories_comment_id' => '5',
                'topic_comment_name' => 'เครื่องดื่ม',
            ),
            14 =>
            array (
                'id' => 15,
                'categories_comment_id' => '5',
                'topic_comment_name' => 'วันลาหยุด'
            ),
        ));
    }
}
