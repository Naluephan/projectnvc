<?php


namespace App\Repositories\Impl;

use App\Models\EmployeeTimeAttendance;
use App\Repositories\EmployeeTimeAttendanceInterface;
use Illuminate\Support\Collection;

class EmployeeTimeAttendanceRepository extends MasterRepository implements EmployeeTimeAttendanceInterface
{
      protected $model;

    public function __construct(EmployeeTimeAttendance $model)
    {
        parent::__construct($model);
    }
    public function empTimeAttendance($param){
        $data = $this->model->where([
            ['emp_id' ,'=', $param['emp_id']],
            ['year' ,'=', $param['year']],
        ])->get();
        return $data;
    }
    
}

    

