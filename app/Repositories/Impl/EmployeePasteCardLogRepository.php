<?php


namespace App\Repositories\Impl;

use App\Models\EmployeePasteCardLog;
use App\Repositories\EmployeePasteCardLogInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class EmployeePasteCardLogRepository extends MasterRepository implements EmployeePasteCardLogInterface
{
    protected $model;

    public function __construct(EmployeePasteCardLog $model)
    {
        parent::__construct($model);
    }
    // ---------- empLog  -------------
    // public function empPasteCardLogApi($param){
    //     $data = $this->model->where([
    //         ['emp_id' ,'=', $param['emp_id']],
    //         ['month' ,'=', $param['month']],
    //         ['year' ,'=', $param['year']],
    //         ['image_capture' ,'=', $param['image_capture']],
    //     ])->orderBy('id', 'DESC')->get();
    // public function empPasteCardLogApi($param)
    // {
    //     $conditions = [];

    //     if (empty($param['emp_id'])) {
    //         return [];
    //     }

    //     if (!empty($param['startDate']) && !empty($param['endDate'])) {
    //         $conditions[] = "STR_TO_DATE(CONCAT(year, '-', month, '-', days), '%Y-%m-%d') BETWEEN '{$param['startDate']}' AND '{$param['endDate']}'";
    //     }

    //     if (!empty($param['emp_id'])) {
    //         $conditions[] = "emp_id = '{$param['emp_id']}'";
    //     }

    //     $whereClause = "";
    //     if (!empty($conditions)) {
    //         $whereClause = " WHERE " . implode(' AND ', $conditions);
    //     }

    //     $query = "SELECT * FROM employee_paste_card_logs" . $whereClause;

    //     $data = DB::select($query);
    //     return $data;
    // }
    // }
    public function empPasteCardLogApi($param): Collection
    {
        return $this->model
            ->where(function ($q) use ($param) {
                if (isset($param['startDate']) && isset($param['endDate'])) {
                    $q->whereBetween('paste_date', [$param['startDate'] . " 00:00:00", $param['endDate'] . " 23:59:59"]);
                }
                if (isset($param['emp_id'])) {
                    $q->where('emp_id', '=', $param['emp_id']);
                }
                if (isset($param['status'])) {
                    $q->where('status', '=', $param['status']);
                }
            })
            ->get();
    }

    public function workCount($param)
    {
        return $this->model
            ->where('status', '=', 1)
            ->where(function ($q) use ($param) {
                if (isset($param['emp_id'])) {
                    $q->where('emp_id', '=', $param['emp_id']);
                }
                if (isset($param['startDate']) && isset($param['endDate'])) {
                    $q->whereBetween('paste_date', [$param['startDate'] . " 00:00:00", $param['endDate'] . " 23:59:59"]);
                }
            })
            ->selectRaw('count(*) as count')
            ->first();
    }
}
