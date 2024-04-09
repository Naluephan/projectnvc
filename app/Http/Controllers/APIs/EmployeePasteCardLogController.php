<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\EmployeePasteCardLog;
use App\Repositories\EmployeeLeaveInterface;
use App\Repositories\EmployeePasteCardLogInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class EmployeePasteCardLogController extends Controller
{
    private $employeePasteCardLogRepository;
    private $employeeLeaveRepository;
    public function __construct(
        EmployeePasteCardLogInterface $employeePasteCardLogRepository,
        EmployeeLeaveInterface $employeeLeaveRepository
    )
    {
        $this->employeePasteCardLogRepository = $employeePasteCardLogRepository;
        $this->employeeLeaveRepository = $employeeLeaveRepository;
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
            $average_attendance_time = 0;
            $late_for_work = 0;
            // $holiday = 0;
            // $holiday = 0;
            // $holiday = 0;
            // $holiday = 0;

            $work_attendance = $this->employeePasteCardLogRepository->workCount($data);
            $work_count = $work_attendance->count;


            $res_data = [
                'work' => $work_count,
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
