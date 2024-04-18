<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RewardCoinHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reward_coin_histories')->insert([
            [
                'emp_id' => 165,
                'company_id' => 1,
                'department_id' => 1,
                'type_reward_id' => 1,
                'reward_name' => 'ขนม',
                'reward_image' => 'https://cdn.discordapp.com/attachments/589087498949361665/685417712406495262/gghh.jpg?ex=65f413fd&is=65e19efd&hm=19ce67a273284ffbb444b4e6d1975bbdb5da3da196a5830bb4ac5c976adc614a&',
                'reward_coins_change' => 100,
                'status_display' => 1,
            ],
            [
                'emp_id' => 165,
                'company_id' => 1,
                'department_id' => 1,
                'type_reward_id' => 2,
                'reward_name' => 'ของมีค่า',
                'reward_image' => 'https://cdn.discordapp.com/attachments/589087498949361665/685417712406495262/gghh.jpg?ex=65f413fd&is=65e19efd&hm=19ce67a273284ffbb444b4e6d1975bbdb5da3da196a5830bb4ac5c976adc614a&',
                'reward_coins_change' => 2000,
                'status_display' => 3,
            ],
        ]);
    }
}
