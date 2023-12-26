<?php

namespace App\Http\Controllers\APIs;


use App\Http\Controllers\Controller;
use App\Repositories\EmployeeLeaveInterface;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    private $employeeLeaveRepository;
    public function __construct(EmployeeLeaveInterface $employeeLeaveRepository)
    {
        $this->employeeLeaveRepository = $employeeLeaveRepository;
    }
    public function EmployeeLeave (Request $request)
    {
        try {
            $data = $request->all();

            $empLeave = $this->employeeLeaveRepository->empLeave($data);
            foreach ($empLeave as $item) {
                $leave_title = '';
                switch($item->leave_type_id) {
                    case 1:
                        $leave_title = 'ลาป่วย';
                        break;
                    case 2:
                        $leave_title = 'ลากิจ';
                        break;
                    case 3:
                        $leave_title = 'ลาพักร้อน';
                        break;
                    case 4:
                        $leave_title = 'ลาคลอด';
                        break;
                    case 5:
                        $leave_title = 'มาสาย';
                        break;
                    case 6:
                        $leave_title = 'ลาอื่นๆ';
                        break;
                    default:
                        $leave_title = 'ไม่ระบุประเภทการลา';
                    }
                    $item->leave_type = $leave_title;
                }
                if(count($empLeave) > 0 ) {
            // if ($empLeave)
                $result['status'] = ApiStatus::leave_success_status;
                $result['statusCode'] = ApiStatus::leave_success_statusCode;
                $result['empLeave'] = $empLeave;
                // $result['empLeave'] = $data;
    
               }else{
                $result['status'] = ApiStatus::leave_failed_status;
                $result['statusCode'] = ApiStatus::leave_failed_statusCode;
                $result['errDesc'] = ApiStatus::leave_failed_Desc;
                // $result['message'] = $empLeave;
                // $result['message'] = $data;
                // DB::rollBack();
               }
        }catch(\Exception $ex){
                $result['status'] = ApiStatus::log_error_statusCode;
                $result['errCode'] = ApiStatus::leave_error_status;
                $result['errDesc'] = ApiStatus::leave_errDesc;
                $result['message'] = $ex->getMessage();
                DB::rollBack();
        }
        return $result;
    }
}
