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
                'news_img1' => 'https://img5.pic.in.th/file/secure-sv1/fd0e494faf35d025c2f1c85b5c60572f.png',
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
                'news_img1' => 'https://img5.pic.in.th/file/secure-sv1/565000000995101.jpeg',
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
                'news_img1' => 'https://img2.pic.in.th/pic/istock-1251272781.jpeg',
                'news_img2' => '',
                'news_img3' => '',
                'record_status' => 1,
                'published_at' => '2024-03-04',
                'cancelled_at' => '2024-03-08',
            ],

        ]);
    }
}
