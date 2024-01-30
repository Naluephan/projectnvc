<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\EmployeePasteCardLog;
use App\Repositories\EmployeePasteCardLogInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class EmployeePasteCardLogController extends Controller
{
    private $employeePasteCardLogRepository;
    public function __construct(EmployeePasteCardLogInterface $employeePasteCardLogRepository)
    {
        $this->employeePasteCardLogRepository = $employeePasteCardLogRepository;
    }

    public function empPasteCardLog (Request $request)
    {
        
       try{
           $data = $request->all();
           $empLog = $this->employeePasteCardLogRepository->empPasteCardLogApi($data);
           if($empLog != null ){
            $result['status'] = ApiStatus::log_success_status;
            $result['statusCode'] = ApiStatus::log_success_statusCode;
            $result['empLog'] = $empLog;

           }else{
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
    
}
