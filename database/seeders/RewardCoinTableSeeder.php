<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class RewardCoinTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    // foreach (range(1, 190) as $index) {
    //     $reward_name = ['Product 1', 'Product 2', 'Product 3', 'Product 4', 'Product 5', 'Product 6'];
    //     $randomImage = 'https://newhr.organicscosme.com/uploads/images/medical_certificate/01.jpg';
    //     $change = ['50', '100', '30', '20', '40'];
    //     $description = 'product description';

    //     DB::table('reward_coins')->insert([
    //         'reward_name' => $reward_name[array_rand($reward_name)],
    //         'reward_image' => $randomImage,
    //         'reward_description' => $description,
    //         'reward_coins_change' => $change[array_rand($change)],
    //     ]);
    // }
    }
}
