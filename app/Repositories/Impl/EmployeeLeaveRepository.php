<?php


namespace App\Repositories\Impl;

use App\Models\EmployeeLeave;
use App\Models\Position;
use App\Repositories\EmployeeLeaveInterface;
use Illuminate\Support\Collection;
use Carbon\Carbon;
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
        ])->get();
        return $data;
    }
    public function saveEmpLeave($param) {
            $empLeave = $this->model->updateOrCreate(
                [
                    'leave_type_id' => $param['leave_type_id'],
                    'leave_type_title' => $param['leave_type_title'],
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

    

