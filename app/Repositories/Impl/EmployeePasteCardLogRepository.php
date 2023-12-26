<?php


namespace App\Repositories\Impl;


use App\Models\EmployeePasteCardLog;
use App\Models\Position;
use App\Repositories\EmployeePasteCardLogInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;

class EmployeePasteCardLogRepository extends MasterRepository implements EmployeePasteCardLogInterface
{
      protected $model;

    public function __construct(EmployeePasteCardLog $model)
    {
        parent::__construct($model);
    }
    // ---------- empLog  -------------
    public function empPasteCardLogApi($param){
        $data = $this->model->where([
            ['emp_id' ,'=', $param['emp_id']],
        ])->get();
        return $data;
    }
}
