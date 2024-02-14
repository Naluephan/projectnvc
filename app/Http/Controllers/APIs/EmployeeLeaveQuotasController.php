<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Repositories\EmployeeLeaveQuotasInterface;
use Illuminate\Http\Request;

class EmployeeLeaveQuotasController extends Controller
{
    private $employeeLeaveQuotasRepository;
    public function __construct(EmployeeLeaveQuotasInterface $employeeLeaveQuotasRepository)
    {
        $this->employeeLeaveQuotasRepository = $employeeLeaveQuotasRepository;
    }

    public function employeeLeaveQuotas(Request $request)
    {
        try {
            $data = $request->all();
            $leaveQuotas = $this->employeeLeaveQuotasRepository->employeeLeaveQuotas($data);
            if (count($leaveQuotas) > 0 ){
                $result['status'] = ApiStatus::leaveQuotase_success_status;
                $result['statusCode'] = ApiStatus::leaveQuotase_success_statusCode;
                $result['data'] = $leaveQuotas;
               }
               else{
                $result['status'] = ApiStatus::leaveQuotase_failed_status;
                $result['errCode'] = ApiStatus::leaveQuotase_failed_statusCode;
                $result['errDesc'] = ApiStatus::leaveQuotase_failed_Desc;
                $result['message'] = $leaveQuotas;
               }
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::leaveQuotase_error_statusCode;
            $result['errCode'] = ApiStatus::leaveQuotase_error_status;
            $result['errDesc'] = ApiStatus::leaveQuotase_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
}
