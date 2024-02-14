<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RewardCoinsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('reward_coins')->delete();
        
        \DB::table('reward_coins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'reward_name' => 'Product 6',
                'reward_image' => 'carebear.png',
                'reward_description' => 'product description',
                'reward_coins_change' => 200,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'reward_name' => 'Product 3',
                'reward_image' => 'iphone14-pro-max-silver_1.png',
                'reward_description' => 'product description',
                'reward_coins_change' => 900,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'reward_name' => 'Product 2',
                'reward_image' => 'macbook.png',
                'reward_description' => 'product description',
                'reward_coins_change' => 1200,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'reward_name' => 'Product 5',
                'reward_image' => 'yeti.png',
                'reward_description' => 'product description',
                'reward_coins_change' => 90,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}