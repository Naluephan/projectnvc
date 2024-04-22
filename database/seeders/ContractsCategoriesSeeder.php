<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ContractsCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contracts_categories')->insert([
            [
                'categories_contract_name' => 'สัญญาจ้าง',
            ],
            [
                'categories_contract_name' => 'สัญญายืมทรัพย์สิน',
            ],
            [
                'categories_contract_name' => 'สัญญารักษาความลับ',
            ],
            [
                'categories_contract_name' => 'สัญญาอนุญาติเปิดเผยข้อมูลส่วนบุลคล',
            ],
        ]);
    }
}
