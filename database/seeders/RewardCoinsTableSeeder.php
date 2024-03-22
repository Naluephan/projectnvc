<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RewardCoinsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        DB::table('reward_coins')->insert([
            [
                'reward_name' => 'Gold Rose',
                'reward_image' => 'Gold-Rose.jpg',
                'reward_description' => '',
                'reward_coins_change' => '5000',
            ],
        ]);
    }
}
