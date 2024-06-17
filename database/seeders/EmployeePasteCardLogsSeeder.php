<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class EmployeePasteCardLogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = bcrypt('123456');
        $adminpass = bcrypt('147369');
        $crpass = bcrypt('Qa4159.orgc');
        $dev = bcrypt('1');

        $faker = Faker::create();

        foreach (range(1, 190) as $index) {
        
            $email = $faker->unique()->safeEmail;
            $empId = rand(1, 190);
            $ramMon = ['01', '02', '03', '04', '05', '05', '06', '07', '08', '09', '10', '11', '12'];
        
            $currentYear = date('Y');
            // $image = $faker->unique()->safeImage;
        
            $randomMonth = $ramMon[array_rand($ramMon)];
            $randomDay = rand(1, cal_days_in_month(CAL_GREGORIAN, $randomMonth, $currentYear));
        
            $date = sprintf('%s-%s-%02d', $currentYear, $randomMonth, $randomDay);
        
            $days = (int) $randomDay;
        
            DB::table('employee_paste_card_logs')->insert([
                'emp_id' => $empId,
                'department_id' => 0,
                'paste_date' => $faker->date,
                'status' => 1,
                'month' => $randomMonth,
                'year' => $currentYear,
                'days' => $days,
                // 'image_capture' => 10,
            ]);
        }
    }
}