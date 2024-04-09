<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\TasEmployees;
use App\Repositories\EmployeeInterface;
use App\Repositories\TasEmployeeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class EmployeeController extends Controller
{
    private $employeeRepository;
    private $tasemployeeRepository;
    public function __construct(EmployeeInterface $employeeRepository, TasEmployeeInterface $tasemployeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->tasemployeeRepository = $tasemployeeRepository;
    }

    public function empList(Request $request)
    {

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

        if (isset($postData['company_id'])) {
            $param['company_id'] = $postData['company_id'];
        }
        if (isset($postData['position_id'])) {
            $param['position_id'] = $postData['position_id'];
        }
        if (isset($postData['department_id'])) {
            $param['department_id'] = $postData['department_id'];
        }


        // Total records
        $totalRecordswithFilter = $totalRecords = $this->employeeRepository->getAll($param)->count();

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
            $update = $this->employeeRepository->update($data['id'], $data);
            $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
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
    public function empLogin(Request $request)
    {
        try {
            $data = $request->all();
            $query = $this->employeeRepository->empLogin($data);
            //    $result = $userData['userData'];

            switch ($query['company_id']) {
                case 1:
                    $query['image'] = $query['image'] ? "https://newhr.organicscosme.com/uploads/images/employee/drjel/" . $query['image'] : null;
                    break;
                case 2:
                    $query['image'] = $query['image'] ? "https://newhr.organicscosme.com/uploads/images/employee/cosme/" . $query['image'] : null;
                    break;
                case 3:
                    $query['image'] = $query['image'] ? "https://newhr.organicscosme.com/uploads/images/employee/inno/" . $query['image'] : null;
                    break;
                case 4:
                    $query['image'] = $query['image'] ? "https://newhr.organicscosme.com/uploads/images/employee/gf/" . $query['image'] : null;
                    break;
                default:
                    $query['image'] = null;
            }

            $result = [
                'id' => $query['id'],
                'company_id' => $query['company_id'],
                'company_name_th' => $query['company']['name_th'],
                'company_name_en' => $query['company']['name_en'],
                'position_id' => $query['position_id'],
                'position_name_th' => $query['position']['name_th'],
                'position_name_en' => $query['position']['name_en'],
                'department_id' => $query['department_id'],
                'department_name_th' => $query['department']['name_th'],
                'department_name_en' => $query['department']['name_en'],
                'employee_card_id' => $query['employee_card_id'],
                'employee_code' => $query['employee_code'],
                'pre_name' => $query['pre_name'],
                'f_name' => $query['f_name'],
                'l_name' => $query['l_name'],
                'n_name' => $query['n_name'],
                'gender_id' => $query['gender_id'],
                'birthday' => $query['birthday'],
                'mobile' => $query['mobile'],
                'card_add' => $query['card_add'],
                'current_add' => $query['current_add'],
                'id_card' => $query['id_card'],
                'start_date' => $query['start_date'],
                'end_date' => $query['end_date'],
                'y_experience' => $query['y_experience'],
                'image' => $query['image'],
                'record_status' => $query['record_status'],
                'coins' => $query['coins'],
                'username' => $query['username'],
                'password' => $query['password'],
                'created_at' => $query['created_at'],
                'updated_at' => $query['updated_at'],
                'pin' => $query['pin'],
                'access_token' => $query['access_token'],

            ];


            if ($result != null) {
                $result['status'] = ApiStatus::login_success_status;
                $result['statusCode'] = ApiStatus::login_success_statusCode;
            } else {
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

    public function savePin(Request $request)
    {
        $data = $request->all();
        $query = $this->employeeRepository->savePinCode($data);
        try {
            if (isset($query)) {
                $result['status'] = ApiStatus::pin_success_status;
                $result['statusCode'] = ApiStatus::pin_success_statusCode;
            } else {
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
    public function checkToken(Request $request)
    {
        try {
            $checkToken = DB::table('personal_access_tokens')
                ->where('id', '=', $request->id)
                ->get();
            if (count($checkToken) > 0) {
                $result['status'] = ApiStatus::checkToken_success_status;
                $result['statusCode'] = ApiStatus::checkToken_success_statusCode;
            } else {
                $result['status'] = ApiStatus::checkToken_failed_status;
                $result['statusCode'] = ApiStatus::checkToken_failed_statusCode;
                $result['errDesc'] = ApiStatus::checkToken_failed_Desc;
                $result['message'] = $checkToken;
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::checkToken_error_statusCode;
            $result['errCode'] = ApiStatus::checkToken_error_status;
            $result['errDesc'] = ApiStatus::checkToken_errDesc;
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }

    public function login_check_password(Request $request)
    {
        try {
            $id_card = $request->id_card;
            $employee_code = $request->employee_code;
            $birthday = $request->birthday;
            $param = [
                'id_card' => $id_card,
                'employee_code' => $employee_code,
                'birthday' => $birthday,
            ];

            $employee = $this->employeeRepository->login_check_password($param);

            if ($employee) {

                $result['status'] = ApiStatus::login_check_password_success_status;
                $result['statusCode'] = ApiStatus::login_check_password_success_statusCode;
                $result['message'] = "Login Check Password successfully.";
                $result['emp_id'] = $employee->id;
            } else {
                $result['status'] = ApiStatus::login_check_password_failed_status;
                $result['statusCode'] = ApiStatus::login_check_password_failed_statusCode;
                $result['errDesc'] = ApiStatus::login_check_password_failed_Desc;
                $result['message'] = "Login Check Password not found or information is incorrect.";
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::login_check_password_error_statusCode;
            $result['errCode'] = ApiStatus::login_check_password_error_status;
            $result['errDesc'] = ApiStatus::login_check_password_errDesc;
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }

    public function profile_check_password(Request $request)
    {
        try {

            $emp_id = $request->emp_id;
            $password = $request->password;
            $param = [
                'emp_id' => $emp_id,
                'password' => $password,
            ];

            $data = $this->employeeRepository->profile_check_password($param);

            if ($data) {
                $result['status'] = ApiStatus::profile_check_password_success_status;
                $result['statusCode'] = ApiStatus::profile_check_password_success_statusCode;
                $result['message'] = "Profile Check Password successfully.";
            } else {
                $result['status'] = ApiStatus::profile_check_password_failed_status;
                $result['statusCode'] = ApiStatus::profile_check_password_failed_statusCode;
                $result['errDesc'] = ApiStatus::profile_check_password_failed_Desc;
                $result['message'] = "Profile Check Password not found or information is incorrect.";
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::profile_check_password_error_statusCode;
            $result['errCode'] = ApiStatus::profile_check_password_error_status;
            $result['errDesc'] = ApiStatus::profile_check_password_errDesc;
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }

    private function encode64($data)
    {
        return base64_encode(base64_encode(base64_encode($data)));
    }

    public function update_password(Request $request)
    {
        try {
            if ($request->has('password') && $request->has('emp_id')) {

                $emp_id = $request->emp_id;
                $password = $this->encode64($request->password);
                $this->employeeRepository->update($emp_id, ['password' => $password]);

                $result['status'] = ApiStatus::update_password_success_status;
                $result['statusCode'] = ApiStatus::update_password_success_statusCode;
                $result['message'] = "Update Password successfully.";
            } else {
                $result['status'] = ApiStatus::update_password_failed_status;
                $result['statusCode'] = ApiStatus::update_password_failed_statusCode;
                $result['errDesc'] = ApiStatus::update_password_failed_Desc;
                $result['message'] = "Update Password not found or information is incorrect.";
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::update_password_error_statusCode;
            $result['errCode'] = ApiStatus::update_password_error_status;
            $result['errDesc'] = ApiStatus::update_password_errDesc;
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }

    public function createRegister(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        try {
            $data = [
                'pre_name' => $data['pre_name'],
                'f_name' => $data['f_name'],
                'l_name' => $data['l_name'],
                'n_name' => $data['n_name'] = data_get($data, 'n_name', 'nullRegis'),
                'birthday' => $data['birthday'] = Carbon::now()->toDateString(),
                'start_date' => $data['start_date'] = Carbon::now()->toDateString(),
                'record_status' => 0,
                'username' => $data['username'],
                'password' => $data['password'],
                'status' => 0,
            ];
            if (isset($data) > 0) {
                $this->employeeRepository->create($data);
                $result = [
                    'status' => 'Success',
                    'statusCode' => '00'
                ];
            } else {
                $result = [
                    'status' => 'Failed to create data',
                    'statusCode' => '01'
                ];
            };
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return response()->json(["data" => $result]);
    }
}
