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
            $query = [
                [1 => 2],[2 => 1],[3 => 1],[4 => 0],[5 => 0],[6 => 0],[7 => 0],[8 => 0],[9 => 0],[10 => 0],[11 => 0],[12 => 0],
            ];
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
