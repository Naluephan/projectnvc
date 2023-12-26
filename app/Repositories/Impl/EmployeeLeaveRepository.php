<?php


namespace App\Repositories\Impl;

use App\Models\EmployeeLeave;
use App\Models\Position;
use App\Repositories\EmployeeLeaveInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class EmployeeLeaveRepository extends MasterRepository implements EmployeeLeaveInterface
{
      protected $model;

    public function __construct(EmployeeLeave $model)
    {
        parent::__construct($model);
    }
    // ---------- empLeave  -------------
    public function empLeave($param){
        $data = $this->model->where([
            ['emp_id' ,'=', $param['emp_id']],
        ])->get();
        return $data;
    }
    function saveEmpLeave($data) {
        try {
            // Validate and sanitize the input data if needed
    
            // Create a new instance of the EmpLeave model
            $empLeave = new EmployeeLeave();
    
            // Assign values to the model properties
            $empLeave->emp_id = $data['emp_id'];
            $empLeave->leave_type_id = $data['leave_type_id'];
            // $empLeave->leave_type_title = $data['leave_type_title'];
            // $empLeave->status_manager_approve = $data['status_manager_approve'];
            // $empLeave->status_hr_approve = $data['status_hr_approve'];
            // $empLeave->leave_detail = $data['leave_detail'];
            // $empLeave->leave_img1 = $data['leave_img1'];
            // $empLeave->leave_img2 = $data['leave_img2'];
            // $empLeave->leave_img3 = $data['leave_img3'];
            // $empLeave->leave_img4 = $data['leave_img4'];
            // $empLeave->leave_img5 = $data['leave_img5'];
            // $empLeave->leave_date_start = $data['leave_date_start'];
            // $empLeave->leave_date_end = $data['leave_date_end'];
            // $empLeave->sum_hours = $data['sum_hours'];
            // $empLeave->month = $data['month'];
            // $empLeave->year = $data['year'];
            // $empLeave->days = $data['days'];
    
            $empLeave->save();
    
            return $empLeave;
    
        } catch (\Exception $ex) {
            return ['error' => $ex->getMessage()];
        }
    }
}
