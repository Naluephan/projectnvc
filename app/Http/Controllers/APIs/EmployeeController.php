<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\TasEmployees;
use App\Repositories\EmployeeInterface;
use App\Repositories\TasEmployeeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;

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
        if(isset($postData['position_id'])){
            $param['position_id'] = $postData['position_id'];
        }
        if(isset($postData['department_id'])){
            $param['department_id'] = $postData['department_id'];
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
                'pin' => $query ['pin'],
                'access_token' => $query ['access_token'],

            ];
            switch($result ['company_id']){
                case 1: 
                    $query ['image'] = $query ['image']?"https://newhr.organicscosme.com/uploads/images/employee/drjel/". $query ['image']:null;
                    break;
                case 2:
                    $query ['image'] = $query ['image']?"https://newhr.organicscosme.com/uploads/images/employee/cosme/". $query ['image']:null;
                    break;
                case 3:
                    $query ['image'] = $query ['image']?"https://newhr.organicscosme.com/uploads/images/employee/inno/". $query ['image']:null;
                    break;
                case 4:
                    $query ['image'] = $query ['image']?"https://newhr.organicscosme.com/uploads/images/employee/gf/". $query ['image']:null;
                    break;
                default:
                    $query ['image'] = null;
            }
        
           if($result != null ){
            $result['status'] = ApiStatus::login_success_status;
            $result['statusCode'] = ApiStatus::login_success_statusCode;

           }else{
            $result['status'] = ApiStatus::login_failed_found_status;
            $result['statusCode'] = ApiStatus::login_failed_found_code;
            $result['errDesc'] = ApiStatus::login_failed_found_Desc;
            $result['message'] = ApiStatus::login_failed_found_Desc;
            DB::rollBack();
           }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::login_error_status;
            $result['statusCode'] = ApiStatus::login_error_statusCod;
            $result['errDesc'] = ApiStatus::login_errDesc;
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    public function savePin (Request $request) {
        $data = $request->all();
        $query = $this->employeeRepository->savePinCode($data);
        try {
                if (isset($query)) {
                    $result['status'] = ApiStatus::pin_success_status;
                    $result['statusCode'] = ApiStatus::pin_success_statusCode;
                
                }else{
                    $result['status'] = ApiStatus::pin_failed_status;
                    $result['statusCode'] = ApiStatus::pin_failed_statusCode;
                    $result['errDesc'] = ApiStatus::pin_failed_Desc;
                }
                } catch (\Exception $ex) {
                    $result['status'] = ApiStatus::pin_error_status;
                    $result['statusCode'] = ApiStatus::pin_error_statusCode;
                    $result['errDesc'] = ApiStatus::pin_errDesc;
                    $result['message'] = $ex->getMessage();
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
        
        $data = $this->employeeRepository->getEmployeesByCompanyAndDepartment($param);
        $createdData = [];
        foreach ($data as $empData) {
            $newData = [
                'emp_id' => $empData['id'],
                'tas_id' => $tas_id,
            ];

            $createdData[] = $newData;
            $check = TasEmployees::where('emp_id', $empData['id'])
            ->where('tas_id', $tas_id)
            ->get();
            //return $check;
            if ($check->isEmpty()) {
                $result['status'] = "Success";
                $create = $this->tasemployeeRepository->create($newData);
            } else {
                $result['status'] = "Failed";
            }
        }
        return $data;
    }
            
    // public function empLogout(Request $request)
    // {
    //     $logout = $request->user()->currentAccessToken()->delete();
    //     try {
    //         if (isset($logout)) {
    //             $result['txnStatus'] = "LOGOUT";
    //             $result['statusCode'] = "00";
    //             $result['errorCode'] = null;
    //             $result['errorDesc'] = null;
    //         }
    //     } catch (\Exception $ex) {
    //         $result['txnStatus'] = "ERROR";
    //         $result['statusCode'] = "10";
    //         $result['errorCode'] = "ELO";
    //         $result['errorDesc'] = "Error Logout";
    //         // $result['errorDesc'] = $ex->getMessage();
    //     }
    //     return json_encode($result);
    // }
    }