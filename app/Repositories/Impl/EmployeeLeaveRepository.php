<?php


namespace App\Repositories\Impl;

use App\Models\EmployeeLeave;
use App\Models\EmployeesLeaveType;
use App\Models\Position;
use App\Repositories\EmployeeLeaveInterface;
use Illuminate\Support\Collection;
use Carbon\Carbon;
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
            ['month' ,'=', $param['month']],
            ['year' ,'=', $param['year']],
        ])->get();
        return $data;
    }

    public function saveEmpLeave($param) {
        $leave_type = DB::table('emp_leave_type')->where('id', '=', $param['leave_type_id'])->first();
            $empLeave = $this->model->updateOrCreate(
                [
                    'leave_type_id' => $param['leave_type_id'],
                    'leave_type_title' => $leave_type->leave_type_name,
                    'emp_id' => $param['emp_id'],
                    'status_hr__approve' => 0,
                    'status_manager_approve' => 0,
                    'leave_detail' => $param['leave_detail'],
                    'leave_date_start' => $param['leave_date_start'],
                    'leave_date_end' => $param['leave_date_end'],
                    'days' => $param['days'],
                    'month' => $param['month'],
                    'year' => $param['year'],
                    'leave_img1' => !empty($param['leave_img1']) ? $param['leave_img1'] : null,
                    'leave_img2' => !empty($param['leave_img2']) ? $param['leave_img2'] : null,
                    'leave_img3' => !empty($param['leave_img3']) ? $param['leave_img3'] : null,
                    'leave_img4' => !empty($param['leave_img4']) ? $param['leave_img4'] : null,
                    'leave_img5' => !empty($param['leave_img5']) ? $param['leave_img5'] : null,
                ]
               
            );

        return $empLeave;
    }
}

    

