<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\EmployeeSalaryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SaralyEmployeesController extends Controller
{
    private $employeeSalaryRepository;
    public function __construct(EmployeeSalaryInterface $employeeSalaryRepository )
    {
        $this->employeeSalaryRepository = $employeeSalaryRepository;
    }
    public function employeeSalary (Request $request) 
    {
        try {
            $data = $request->all();
            $query = $this->employeeSalaryRepository->employeeSalary($data);

           
            if(isset($query )) {
                $result['status'] = ApiStatus::salary_success_status;
                $result['statusCode'] = ApiStatus::salary_success_statusCode;
                $result['emp_salary'] = $query;
    
               }else{
                $result['status'] = ApiStatus::salary_failed_status;
                $result['errCode'] = ApiStatus::salary_failed_statusCode;
                $result['errDesc'] = ApiStatus::salary_failed_Desc;
                $result['message'] = $query;
                DB::rollBack(); 
            }
        }catch(\Exception $ex) {
            $result['status'] = ApiStatus::salary_error_statusCode;
            $result['errCode'] = ApiStatus::salary_error_status;
            $result['errDesc'] = ApiStatus::salary_errDesc;
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }
}
