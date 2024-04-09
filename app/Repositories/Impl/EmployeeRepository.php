<?php


namespace App\Repositories\Impl;


use App\Models\Employee;
use App\Models\Position;
use App\Repositories\EmployeeInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Hash;


class EmployeeRepository extends MasterRepository implements EmployeeInterface
{
    protected $model;

    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }

    // ---------- empLogin  -------------
    public function empLogin($param)
    {
        $user =  $this->model->where([
            ['username', '=', $param['username']],
            ['password', '=',$this->encode64($param['password'])],
        ])->with('company', 'position', 'department')->first();

        if (isset($user)) {
            $user->tokens()->delete();
            $user->access_token = $user->createToken('newhr', ['employee'])->plainTextToken;
        }
        return $user;
    }
    // ---------- savePin  -------------
    public function savePinCode($param)
    {
        $codePin = $this->model->where('id', '=', $param['id'])->first();

        if (isset($codePin)) {
            $codePin->pin = $param['pin'];
            $codePin->save();
        }
        return $codePin;
    }

    public function getAll($param): Collection
    {
        return $this->model
            ->where('record_status', '=', 1)
            ->where(function ($q) use ($param) {
                if (isset($param['searchValue'])) {
                    $q->where('f_name', "like", '%' . $param['searchValue'] . '%');
                    $q->orWhere('l_name', "like", '%' . $param['searchValue'] . '%');
                    $q->orWhere('employee_card_id', "like", '%' . $param['searchValue'] . '%');
                }
            })
            ->where(function ($q1) use ($param) {
                if (isset($param['company_id']) && $param['company_id'] >= 1) {
                    $q1->Where('company_id', '=', $param['company_id']);
                } elseif (isset($param['company_id']) && $param['company_id'] == 0) {
                    $q1->Where('company_id', '=', 6);
                }
                if (isset($param['department_id']) && $param['department_id'] >= 1) {
                    $q1->Where('department_id', '=', $param['department_id']);
                }
                if (isset($param['position_id']) && $param['position_id'] >= 1) {
                    $q1->Where('position_id', '=', $param['position_id']);
                }
            })
            ->get();
    }

    public function paginate($param): Collection
    {
        $data = $this->model->with('position', 'company')->orderBy($param['columnName'], $param['columnSortOrder'])
            ->where('record_status', '=', 1)
            ->where(function ($q) use ($param) {
                if (isset($param['searchValue'])) {
                    $q->where('f_name', "like", '%' . $param['searchValue'] . '%');
                    $q->orWhere('l_name', "like", '%' . $param['searchValue'] . '%');
                    $q->orWhere('employee_card_id', "like", '%' . $param['searchValue'] . '%');
                }
            })
            ->where(function ($q1) use ($param) {
                if (isset($param['company_id']) && $param['company_id'] >= 1) {
                    $q1->Where('company_id', '=', $param['company_id']);
                } elseif (isset($param['company_id']) && $param['company_id'] == 0) {
                    $q1->Where('company_id', '=', 6);
                }
                if (isset($param['department_id']) && $param['department_id'] >= 1) {
                    $q1->Where('department_id', '=', $param['department_id']);
                }
                if (isset($param['position_id']) && $param['position_id'] >= 1) {
                    $q1->Where('position_id', '=', $param['position_id']);
                }
            })
            ->skip($param['start'])
            ->take($param['rowperpage'])->get();

        return $data;
    }


    public function saveExcel($excel)
    {
        $response = [];
        DB::beginTransaction();
        $rows = (new FastExcel)->import($excel);
        try {
            foreach ($rows as $row) {
                $f_name = $row['f_name'];
                $l_name = $row['l_name'];
                $n_name = $row['n_name'];

                // Check if the combination of first name, last name, and nickname already exists
                $existingEmployee = $this->model->where('f_name', $f_name)
                    ->where('l_name', $l_name)
                    // ->where('n_name', $n_name)
                    ->exists();

                if ($existingEmployee) {
                    continue; // Skip importing this row
                }

                $company_id = $row['company_id'];
                $position_id = $row['position_id'];
                $department_id = $row['department_id'];
                $pre_name = $row['pre_name'];
                $mobile = $row['mobile'];
                $birthday = $row['birthday'];
                //$employee_code = str_pad($row['รหัสพนักงาน'], 4, "0", STR_PAD_LEFT);
                $employee_code = $row['employee_code'];
                $card_add = $row['card_add'];
                $current_add = $row['current_add'];
                $id_card = $row['id_card'];
                $start_date = $row['start_date'];
                $end_date = $row['end_date'];
                $y_experience = null;
                $employee_card_id = $row['employee_card_id'];
                //$position = Position::where('name_th', $position_name)->first();
                //$position_id = $position ? $position->id : null;

                $gender = $row['gender_id'];

                // if ($row['เพศ'] == 'ชาย') {
                //     $gender = 1;
                // } elseif ($row['เพศ'] == 'หญิง') {
                //     $gender = 2;
                // }
                $image = $row['image'];
                $record_status = $row['record_status'];
                $username = $row['username'];
                $password = $row['password'];

                $data = [
                    'company_id' => $company_id,
                    'position_id' => $position_id,
                    'department_id' => $department_id,
                    'employee_card_id' => $employee_card_id,
                    'employee_code' => $employee_code,
                    'pre_name' => $pre_name,
                    'f_name' => $f_name,
                    'l_name' => $l_name,
                    'n_name' => $n_name,
                    'gender_id' => $gender,
                    'birthday' => $birthday,
                    'mobile' => $mobile,
                    'card_add' => $card_add,
                    'current_add' => $current_add,
                    'id_card' => $id_card,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'y_experience' => $y_experience,
                    'image' => $image,
                    'record_status' => $record_status,
                    'username' => $username,
                    'password' => $password,
                ];

                $this->model->create($data);
            }

            $response['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $response['status'] = "failed";
            $response['message'] = $ex->getMessage();
            DB::rollBack();
        }

        return $response;
    }


    public function getUserProfile($empId)
    {
        return $this->model->with('position', 'company')
            ->where('employees.id', '=', $empId)
            ->first();
    }

    public function saveExcelUpdate($excel)
    {
        $response = [];
        DB::beginTransaction();
        $rows = (new FastExcel)->import($excel);
        try {
            foreach ($rows as $row) {
                $company_id = $row['company'];
                $employee_card_id = $row['CARD_ID'];
                $f_name = $row['f_name'];
                $l_name = $row['l_name'];

                if (!empty($employee_card_id)) {
                    $this->model
                        ->where('f_name', $f_name)
                        ->where('l_name', $l_name)
                        ->where('company_id', $company_id)
                        ->update(['employee_card_id' => $employee_card_id]);
                }
            }

            $response['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $response['status'] = "failed";
            $response['message'] = $ex->getMessage();
            DB::rollBack();
        }

        return $response;
    }

    public function saveExcelUpdate2($excel)
    {
        $response = [];
        DB::beginTransaction();
        $rows = (new FastExcel)->import($excel);
        try {
            foreach ($rows as $row) {
                $employee_code = $row['รหัสพนักงาน'];

                $order_array = explode(' ', $employee_code);
                $employee_code = $order_array[1];
                $employee_code2 = $order_array[0];
                $company_id = $row['company'];
                $employee_card_id = $row['ID CARD'];

                $this->model
                    ->where('employee_code', $employee_code)
                    ->where('company_id', $company_id)
                    ->update(['employee_card_id' => $employee_card_id]);

                $this->model
                    ->where('employee_code', $employee_code2)
                    ->where('company_id', $company_id)
                    ->update(['employee_card_id' => $employee_card_id]);
            }

            $response['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $response['status'] = "failed";
            $response['message'] = $ex->getMessage();
            DB::rollBack();
        }

        return $response;
    }


    public function findById($id)
    {
        $lead =  $this->model->with('position', 'company')
            ->select('*')
            ->where('id', '=', $id)->first();
        return $lead;
    }

    public function getEmployeesByCompanyAndDepartment($param)
    {
        return $this->model
            ->where('company_id', '=', $param['company_id'])
            ->where('department_id', '=', $param['department_id'])
            ->get();
    }

    public function profile_check_password($param)
    {
        $employee = $this->model
            ->where('id', '=', $param['emp_id'])
            ->first();

        if ($employee) {
            if (Hash::check($param['password'], $employee->password)) {
                return $employee;
            } else {
                return $this->model
                    ->where('id', '=', $param['emp_id'])
                    ->where('password', '=', $this->encode64($param['password']))
                    ->first();
            }
        }
        return null;
    }

    public function login_check_password($param)
    {
        return $this->model
            ->where('id_card', '=', $param['id_card'])
            ->where('employee_code', '=', $param['employee_code'])
            ->where('birthday', '=', $param['birthday'])
            ->first();
    }

    private function encode64($data)
    {
        return base64_encode(base64_encode(base64_encode($data)));
    }
}
