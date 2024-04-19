<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ReportRepairCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('report_repair_categories')->insert([
            [
                'categories_name' => 'เครื่องจักร'
            ],
            [
                'categories_name' => 'อุปกรณ์'
            ],
            [
                'categories_name' => 'เฟอร์นิเจอร์'
            ],
            [
                'categories_name' => 'ไฟฟ้า'
            ],
            [
                'categories_name' => 'ประปา'
            ],
        ]);
    }
}
