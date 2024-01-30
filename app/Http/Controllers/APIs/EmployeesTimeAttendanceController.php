<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\EmployeeSalaryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class EmployeesTimeAttendanceController extends Controller
{
    private $empTimeattendanceRepository;
    public function __construct(EmployeeSalaryInterface $empTimeattendanceRepository )
    {
        $this->empTimeattendanceRepository = $empTimeattendanceRepository;
    }
    public function empTimeByMonthAndYear (Request $request) 
    {
        try {
            $data = $request->all();
           $query = [['m_1' => 2,'m_2' => 1,'m_3' => 1,'m_4' => 1,'m_5' => 0,'m_6' => 0,'m_7' => 0,'m_8' => 0,'m_9' => 0,'m_10' => 0,'m_11' => 0,'m_12' => 0]];
            // $query = $this->employeeSalaryRepository->employeeSalary($data);

           
            if(isset($query )) {
                $result['status'] = ApiStatus::timeAttendance_success_status;
                $result['statusCode'] = ApiStatus::timeAttendance_success_statusCode;
                $result['emp_attendance'] = $query;
    
               }else{
                $result['status'] = ApiStatus::timeAttendance_failed_status;
                $result['errCode'] = ApiStatus::timeAttendance_failed_statusCode;
                $result['errDesc'] = ApiStatus::timeAttendance_failed_Desc;
                DB::rollBack(); 
            }
        }catch(\Exception $ex) {
            $result['status'] = ApiStatus::timeAttendance_error_statusCode;
            $result['errCode'] = ApiStatus::timeAttendance_error_status;
            $result['errDesc'] = ApiStatus::timeAttendance_errDesc;
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }
}
