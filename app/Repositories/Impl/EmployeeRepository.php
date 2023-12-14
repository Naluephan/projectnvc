<?php


namespace App\Repositories\Impl;


use App\Models\Employee;
use App\Models\Position;
use App\Repositories\EmployeeInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;

class EmployeeRepository extends MasterRepository implements EmployeeInterface
{
    protected $model;

    public function __construct(Employee $model)
    {
        parent::__construct($model);
    }

    public function getAll($param): Collection
    {
        return $this->model
            ->where('record_status','=',1)
            ->where(function($q) use ($param){
                if (isset($param['searchValue'])) {
                    $q->where('f_name', "like", '%' . $param['searchValue'] . '%');
                    $q->orWhere('l_name', "like", '%' . $param['searchValue'] . '%');
                    $q->orWhere('employee_card_id', "like", '%' . $param['searchValue'] . '%');
                }
            })
            ->where(function($q1) use ($param){
                if(isset($param['company_id']) && $param['company_id'] >= 1){
                    $q1->Where('company_id', '=', $param['company_id']);
                } elseif (isset($param['company_id']) && $param['company_id'] == 0){
                    $q1->Where('company_id', '=', 6);
                }
            })
            ->get();
    }

    public function paginate($param): Collection
    {
        $data = $this->model->with('position','company')->orderBy($param['columnName'],$param['columnSortOrder'])
            ->where('record_status','=',1)
            ->where(function($q) use ($param){
                if (isset($param['searchValue'])) {
                    $q->where('f_name', "like", '%' . $param['searchValue'] . '%');
                    $q->orWhere('l_name', "like", '%' . $param['searchValue'] . '%');
                    $q->orWhere('employee_card_id', "like", '%' . $param['searchValue'] . '%');
                }
            })
            ->where(function($q1) use ($param){
                if(isset($param['company_id']) && $param['company_id'] >= 1){
                    $q1->Where('company_id', '=', $param['company_id']);
                } elseif (isset($param['company_id']) && $param['company_id'] == 0){
                    $q1->Where('company_id', '=', 6);
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
                $f_name = $row['ชื่อ'];
                $l_name = $row['สกุล'];
                $n_name = $row['ชื่อเล่น'];

                // Check if the combination of first name, last name, and nickname already exists
                $existingEmployee = $this->model->where('f_name', $f_name)
                    ->where('l_name', $l_name)
                    ->where('n_name', $n_name)
                    ->exists();

                if ($existingEmployee) {
                    continue; // Skip importing this row
                }

                $company_id = $row['company'];
                $position_name = $row['ตำแหน่งงาน'];
                $department_id = '';
                $pre_name = $row['คำนำหน้า'];
                $mobile = $row['เบอร์โทรศัพท์'];
                $birthday = $row['วัน/เดือน/ปีเกิด'];
                $employee_code = str_pad($row['รหัสพนักงาน'], 4, "0", STR_PAD_LEFT);
                $card_add = '';
                $current_add = $row['ที่อยู่ปัจจุบัน'];
                $id_card = $row['เลขที่บัตรประชาชน'];
                $start_date = $row['วันที่เริ่มจ้าง'];
                $end_date = $row['วันสิ้นสุดการจ้าง'];
                $y_experience = '';

                $position = Position::where('name_th', $position_name)->first();
                $position_id = $position ? $position->id : null;

                $gender = $row['เพศ'];

                if ($row['เพศ'] == 'ชาย') {
                    $gender = 1;
                } elseif ($row['เพศ'] == 'หญิง') {
                    $gender = 2;
                }

                $data = [
                    'company_id' => $company_id,
                    'position_id' => $position_id,
                    'pre_name' => $pre_name,
                    'f_name' => $f_name,
                    'l_name' => $l_name,
                    'n_name' => $n_name,
                    'gender_id' => $gender,
                    'birthday' => $birthday,
                    'employee_code' => $employee_code,
                    'mobile' => $mobile,
                    'card_add' => $card_add,
                    'current_add' => $current_add,
                    'id_card' => $id_card,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
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
            ->where('employees.employee_card_id', '=', $empId)
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
        $lead =  $this->model->with('position','company')
            ->select('*')
            ->where('id','=',$id)->first();
        return $lead;
    }

}
