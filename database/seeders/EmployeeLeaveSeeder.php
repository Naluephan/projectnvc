<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmployeeLeaveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $password = bcrypt('123456');
        // $adminpass = bcrypt('147369');
        // $crpass = bcrypt('Qa4159.orgc');
        // $dev = bcrypt('1');

        $faker = Faker::create();

        foreach (range(1, 190) as $index) {

            $email = $faker->unique()->safeEmail;
            $empId = rand(1, 190);
            $ramMon = ['01', '02', '03', '04', '05', '05', '06', '07', '08', '09', '10', '11', '12'];
            $ranStatusApproveHr = ['0', '1'];
            $ranStatusApproveMg = ['0', '1'];
            $detail = ['ลาป่วย', 'ลากิจ', 'ลาพักร้อน', 'อื่นๆ', 'ก็ลาจะทำไม', 'ขี้เกียจ'];
            $leave_img = ['https://newhr.organicscosme.com/uploads/images/medical_certificate/01.jpg'];

            $currentYear = date('Y');

            $randomMonth = $ramMon[array_rand($ramMon)];
            $randomImage = $leave_img[array_rand($leave_img)];
            $randomDay = rand(1, cal_days_in_month(CAL_GREGORIAN, $randomMonth, $currentYear));
            $date = sprintf('%s-%s-%02d', $currentYear, $randomMonth, $randomDay);
            $randomDayStart = rand(1, cal_days_in_month(CAL_GREGORIAN, $randomMonth, $currentYear));
            $randomDayEnd = rand($randomDayStart, cal_days_in_month(CAL_GREGORIAN, $randomMonth, $currentYear));
            $day = (int) $randomDay;
            $dateStart = sprintf('%s-%s-%02d', $currentYear, $randomMonth, $randomDayStart);
            $dateEnd = sprintf('%s-%s-%02d', $currentYear, $randomMonth, $randomDayEnd);

            DB::table('employee_leaves')->insert([
                'emp_id' => $empId,
                'leave_type_id' => 1,
                'leave_type_title' => 0,
                'status_manager_approve' => $ranStatusApproveMg[array_rand($ranStatusApproveMg)], 
                'status_hr__approve' => $ranStatusApproveHr[array_rand($ranStatusApproveHr)], 
                'leave_detail' => $detail[array_rand($detail)], 
                'leave_img1' => $randomImage,
                'leave_img2' => $randomImage,
                'leave_img3' => $randomImage,
                'leave_img4' => $randomImage,
                'leave_img5' => $randomImage,
                'leave_date_start' => $dateStart,
                'leave_date_end' => $dateEnd,
                'sum_hours' => null,
                'month' => $randomMonth,
                'year' => $currentYear,
                'days' => $day,
            ]);
        }
    }
}
