<?php


namespace App\Repositories\Impl;

use App\Models\SalaryEmployees;
use App\Repositories\EmployeeSalaryInterface;
use Illuminate\Support\Collection;

class EmployeeSalaryRepository extends MasterRepository implements EmployeeSalaryInterface
{
      protected $model;

    public function __construct(SalaryEmployees $model)
    {
        parent::__construct($model);
    }
    public function employeeSalary($param){
        $data = $this->model->where([
            ['emp_id' ,'=', $param['emp_id']],
            ['month' ,'=', $param['month']],
            ['year' ,'=', $param['year']],
        ])->get();
        return $data;
    }
    
}

    

