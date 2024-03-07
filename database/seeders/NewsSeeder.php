<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert([
            [
                'newsCate_id' => 1,
                'announcer_id' => 1,
                'name_news' => 'News 1',
                'news_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc leo elit, tristique eget lacinia eget, viverra ut mi. Duis sit amet sodales leo, ac accumsan nisl. Donec eget elementum metus',
                'news_img1' => 'https://cdn.discordapp.com/attachments/589087498949361665/937990680398151730/257920404_401008568392013_6644302903585160490_n.jpg?ex=65f014e5&is=65dd9fe5&hm=0819ba5af691d1c5b1212847842253cc1883c3d125ac76960812627c34e99f3a&',
                'news_img2' => '',
                'news_img3' => '',
                'record_status' => 1,
                'published_at' => '2024-03-04',
                'cancelled_at' => '2024-03-08',
            ],
            [
                'newsCate_id' => 2,
                'announcer_id' => 1,
                'name_news' => 'News 2',
                'news_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc leo elit, tristique eget lacinia eget, viverra ut mi. Duis sit amet sodales leo, ac accumsan nisl. Donec eget elementum metus',
                'news_img1' => 'https://cdn.discordapp.com/attachments/589087498949361665/937990680398151730/257920404_401008568392013_6644302903585160490_n.jpg?ex=65f014e5&is=65dd9fe5&hm=0819ba5af691d1c5b1212847842253cc1883c3d125ac76960812627c34e99f3a&',
                'news_img2' => '',
                'news_img3' => '',
                'record_status' => 1,
                'published_at' => '2024-03-04',
                'cancelled_at' => '2024-03-08',
            ],
            [
                'newsCate_id' => 2,
                'announcer_id' => 1,
                'name_news' => 'News 3',
                'news_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc leo elit, tristique eget lacinia eget, viverra ut mi. Duis sit amet sodales leo, ac accumsan nisl. Donec eget elementum metus',
                'news_img1' => 'https://cdn.discordapp.com/attachments/589087498949361665/937985243535802378/90518310_p5.jpg?ex=65f00fd4&is=65dd9ad4&hm=590ad3c73e03dbd5e4c78c402a5ccea71c6343174e66c7be0a808d66b70b9897&',
                'news_img2' => '',
                'news_img3' => '',
                'record_status' => 1,
                'published_at' => '2024-03-04',
                'cancelled_at' => '2024-03-08',
            ],

        ]);
    }
}
