<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\EmployeeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    private $employeeRepository;
    public function __construct(EmployeeInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function empList(Request $request){

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

        if(isset($postData['company_id'])){
            $param['company_id'] = $postData['company_id'];
        }


        // Total records
        $totalRecordswithFilter = $totalRecords =$this->employeeRepository->getAll($param)->count();

        // Fetch records
        $records = $this->employeeRepository->paginate($param);

        return [
            "aaData" => $records,
            "draw" => $draw,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
        ];
    }

    public function employeeDelete(Request $request)
    {
        DB::beginTransaction();
        $result = [];
        $data = $request->all();
        try {
        $update = $this->employeeRepository->update($data['id'],$data);
        $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "failed";
            $result['message'] = $ex;
            DB::rollBack();
        }
        return $result;
    }

    public function findEmpById(Request $request)
    {
        $data = $request->all();
        try {
            $data = $this->employeeRepository->findById($data['id']);
            return $data;
        } catch (\Exception $ex) {
            $result['status'] = 'Failed';
            // $result['message'] = $ex->getMessage();
            return $result;
        }

        // dd($data->leadOrders[0]->orderDetails);

    }
    public function empLogin (Request $request)
    {
       try{
           $data = $request->all();
           $result = $this->employeeRepository->empLogin($data);
        //    $result = $userData['userData'];
        
        // if($result ['company_id'] == 1){
            $result ['image'] = $result ['image']?"https://4923-58-136-47-149.ngrok-free.app/public/uploads/images/employee/inno/". $result ['image']:null;
        // }
        
           if($result != null ){
            $result['status'] = ApiStatus::status;
            $result['statusCode'] = ApiStatus::statusCode;

           }else{
            $result['status'] = ApiStatus::user_error;
            $result['statusCode'] = ApiStatus::user_status;
            $result['errDesc'] = ApiStatus::errDesc;
            $result['message'] = ApiStatus::message;
            DB::rollBack();
           }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::user_login_error;
            $result['statusCode'] = ApiStatus::user_login_error_status;
            $result['errDesc'] = ApiStatus::user_login_errDesc;
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }
}
