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

            $result = [
                'emp_id' => $query ['emp_id'],
                'salary' => $query ['salary'],
                'diligence_allowance' => $query ['diligence_allowance'],
                'overtime' => $query ['overtime'],
                'fuel_cost' => $query ['fuel_cost'],
                'bonus' => $query ['bonus'],
                'interest' => $query ['interest'],
                'commission' => $query ['commission'],
                'get_orthers' => $query ['get_orthers'],
                'total_earning' => $query ['total_earning'],
                'social_security_fund' => $query ['social_security_fund'],
                'withholding_tax' => $query ['withholding_tax'],
                'deposit' => $query ['deposit'],
                'absent_leave_late' => $query ['absent_leave_late'],
                'company_loan' => $query ['company_loan'],
                'deposit_fund' => $query ['deposit_fund'],
                'deduc_others' => $query ['deduc_others'],
                'total_deductions' => $query ['total_deductions'],
                'net_pay' => $query ['net_pay'],
                'day' => $query ['day'],
                'month' => $query ['month'],
                'year' => $query ['year'],
            ];
            if($query != null) {
                $result['status'] = ApiStatus::salary_success_status;
                $result['statusCode'] = ApiStatus::salary_success_statusCode;
    
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
