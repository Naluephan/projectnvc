<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\EmployeePasteCardLog;
use App\Repositories\EmployeeLeaveInterface;
use App\Repositories\EmployeePasteCardLogInterface;
use App\Repositories\HolidayInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class EmployeePasteCardLogController extends Controller
{
    private $employeePasteCardLogRepository;
    private $employeeLeaveRepository;
    private $holidayRepository;

    public function __construct(
        EmployeePasteCardLogInterface $employeePasteCardLogRepository,
        EmployeeLeaveInterface $employeeLeaveRepository,
        HolidayInterface $holidayRepository
    ) {
        $this->employeePasteCardLogRepository = $employeePasteCardLogRepository;
        $this->employeeLeaveRepository = $employeeLeaveRepository;
        $this->holidayRepository = $holidayRepository;
    }

    public function empPasteCardLog(Request $request)
    {

        try {
            $data = $request->all();
            $empLog = $this->employeePasteCardLogRepository->empPasteCardLogApi($data);
            if ($empLog != null) {
                $result['status'] = ApiStatus::log_success_status;
                $result['statusCode'] = ApiStatus::log_success_statusCode;
                $result['empLog'] = $empLog;
            } else {
                $result['status'] = ApiStatus::log_failed_status;
                $result['errCode'] = ApiStatus::log_failed_statusCode;
                $result['errDesc'] = ApiStatus::log_failed_Desc;
                $result['message'] = $empLog;
                DB::rollBack();
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::log_error_statusCode;
            $result['errCode'] = ApiStatus::log_error_status;
            $result['errDesc'] = ApiStatus::log_errDesc;
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }


    public function summaryWorkAttendance(Request $request)
    {
        try {
            $data = $request->all();
            $work_count = 0;
            $leave_work = 0;
            $total_working_days = 0;
            $holiday = 0;
            $averageTime = 0;
            $late_for_work = 0;
            // $holiday = 0;
            // $holiday = 0;
            // $holiday = 0;
            // $holiday = 0;

            $work = $this->employeePasteCardLogRepository->workCount($data);
            $work_count = $work->count;

            $average = $data;
            $average['status'] = 1;
            $work_attendance = $this->employeePasteCardLogRepository->empPasteCardLogApi($average);
            $totalMinutes = 0;
            $count = 0;

            foreach ($work_attendance as $attendance) {
                $pasteTime = strtotime($attendance->paste_date);
                $totalMinutes += date('H', $pasteTime) * 60 + date('i', $pasteTime);
                $count++;
            }

            if ($count > 0) {
                $averageMinutes = $totalMinutes / $count;

                $hours = floor($averageMinutes / 60);
                $minutes = $averageMinutes % 60;

                $averageTime = sprintf("%02d:%02d:00", $hours, $minutes);
            }

            $emp_leave = $this->employeeLeaveRepository->leaveCount($data);
            $leave_work = $emp_leave->count;

            $holidays = $this->holidayRepository->holidayCount($data);
            $holiday = $holidays->count;

            $late = $data;
            $late['status'] = 0;
            $late_work = $this->employeePasteCardLogRepository->empPasteCardLogApi($late);

            $res_data = [
                'work' => $work_count,
                'leave_work' => $leave_work,
                'total_working_days' => $total_working_days,
                'holiday' => $holiday,
                'average_attendance_time' => $averageTime,
                'late_for_work' => $late_work,
            ];
            $result['status'] = ApiStatus::log_success_status;
            $result['statusCode'] = ApiStatus::log_success_statusCode;
            $result['empLog'] =  $res_data;
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::saving_money_error_statusCode;
            $result['errCode'] = ApiStatus::saving_money_error_status;
            $result['errDesc'] = ApiStatus::saving_money_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
}
