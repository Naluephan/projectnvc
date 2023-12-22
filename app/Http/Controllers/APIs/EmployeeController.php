<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\TasEmployees;
use App\Repositories\EmployeeInterface;
use App\Repositories\TasEmployeeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    private $employeeRepository;
    private $tasemployeeRepository;
    public function __construct(EmployeeInterface $employeeRepository,TasEmployeeInterface $tasemployeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->tasemployeeRepository = $tasemployeeRepository;
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
           $query = $this->employeeRepository->empLogin($data);
        //    $result = $userData['userData'];
        
        // if($result ['company_id'] == 1){
            $query ['image'] = $query ['image']?"https://4923-58-136-47-149.ngrok-free.app/public/uploads/images/employee/inno/". $result ['image']:null;
        // }
            $result =[
                'id' => $query ['id'],
                'company_id' => $query ['company_id'],
                'company_name_th' => $query ['company']['name_th'],
                'company_name_en' => $query ['company']['name_en'],
                'position_id' => $query ['position_id'],
                'position_name_th' => $query ['position']['name_th'],
                'position_name_en' => $query ['position']['name_en'],
                'department_id' => $query ['department_id'],
                'department_name_th' => $query ['department']['name_th'],
                'department_name_en' => $query ['department']['name_en'],
                'employee_card_id' => $query ['employee_card_id'],
                'employee_code' => $query ['employee_code'],
                'pre_name' => $query ['pre_name'],
                'f_name' => $query ['f_name'],
                'l_name' => $query ['l_name'],
                'n_name' => $query ['n_name'],
                'gender_id' => $query ['gender_id'],
                'birthday' => $query ['birthday'],
                'mobile' => $query ['mobile'],
                'card_add' => $query ['card_add'],
                'current_add' => $query ['current_add'],
                'id_card' => $query ['id_card'],
                'start_date' => $query ['start_date'],
                'end_date' => $query ['end_date'],
                'y_experience' => $query ['y_experience'],
                'image' => $query ['image'],
                'record_status' => $query ['record_status'],
                'coins' => $query ['coins'],
                'username' => $query ['username'],
                'password' => $query ['password'],
                'created_at' => $query ['created_at'],
                'updated_at' => $query ['updated_at'],
                'access_token' => $query ['access_token'],

            ];
        
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

    public function getEmployeesByCompanyAndDepartment(Request $request)
    {
        $company_id = $request->company_id;
        $department_id = $request->department_id;
        $tas_id = $request->tas_id;
        $param = [
            'company_id' => $company_id,
            'department_id' => $department_id,
        ];
        return $this->employeeRepository->getEmployeesByCompanyAndDepartment($param);
        // $createdData = [];
        // foreach ($data as $empData) {
        //     $newData = [
        //         'emp_id' => $empData['id'],
        //         'tas_id' => $tas_id,
        //     ];

        //     $createdData[] = $newData;
        //     $check = TasEmployees::where('emp_id', $empData['id'])
        //     ->where('tas_id', $tas_id)
        //     ->get();
        //     //return $check;
        //     if ($check->isEmpty()) {
        //         $result['status'] = "Success";
        //         $create = $this->tasemployeeRepository->create($newData);
        //     } else {
        //         $result['status'] = "Failed";
        //     }
            
         }
}
