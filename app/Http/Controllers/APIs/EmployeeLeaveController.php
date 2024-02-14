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

    public function saveEmpLeave(Request $request) {
        $data = $request->all();
        try {
            
            if(isset($data['leave_imgs'])){
                foreach ($data['leave_imgs'] as $index => $image) {
                    $file = save_image($image, 2000, '/images/leave_emp/');
                    $data['leave_img' . $index + 1] = $file;
                }
            }
            
                // save_image($data['leave_img1'], 2000, '/images/leave_emp');

            $empLeave = $this->employeeLeaveRepository->saveEmpLeave($data);
            if (isset($empLeave)) {
            $result['txnStatus'] = "UPDATED";
            $result['statusCode'] = "00";
            $result['errorCode'] = null;
            $result['errorDesc'] = null;
            }
           
        } catch (\Exception $ex) {
            $result['txnStatus'] = "ERROR";
            $result['statusCode'] = "10";
            $result['errorCode'] = "EUP";
            $result['errorDesc'] = $ex->getMessage();
        }
        return json_encode($result);
    
    }

    ///For Web
    public function getAll(Request $request){
        $postData = $request->all();
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page

        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value
        $param = [
            "columnName" => $columnName,
            "columnSortOrder" => $columnSortOrder,
            "searchValue" => $searchValue,
            "start" => $start,
            "rowperpage" => $rowperpage,
        ];


        // Total records
        $totalRecordswithFilter = $totalRecords = $this->employeeLeaveRepository->getAll($param)->count();

        if (strlen($searchValue) > 0) {
            $totalRecordswithFilter = $this->employeeLeaveRepository->getAll($param)->count();
        }

        // Fetch records
        $records = $this->employeeLeaveRepository->paginate($param);

        return [
            "aaData" => $records,
            "draw" => $draw,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
        ];
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        $result['status'] = "Success";
        try {
            $this->employeeLeaveRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function getById(Request $request)
    {
        $id = $request->id;
        return $this->employeeLeaveRepository->getLeaveById($id);
    }

    public function approveStatusLeave(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        $data = [
            'status_hr__approve' => 1,
        ];
        try {
            $this->employeeLeaveRepository->update($id,$data);
            $result['status'] = "Success";
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }
}
