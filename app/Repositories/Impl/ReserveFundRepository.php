<?php


namespace App\Repositories\Impl;

use App\Models\ReserveFund;
use App\Repositories\ReserveFundInterface;
use Illuminate\Support\Collection;

class ReserveFundRepository extends MasterRepository implements ReserveFundInterface
{
    protected $model;

    public function __construct(ReserveFund $model)
    {
        parent::__construct($model);
    }

    public function getReserveFund($params)
    {
        $query = $this->model->query();

        if (isset($params['emp_id'])) {
            $query->where('emp_id', $params['emp_id']);
        }

        if (isset($params['company_id'])) {
            $query->where('company_id', $params['company_id']);
        }

        if (isset($params['department_id'])) {
            $query->where('department_id', $params['department_id']);
        }
        if (isset($params['position_id'])) {
            $query->where('position_id', $params['position_id']);
        }

        $query->where('record_status', 1)->with([
            'company' => function ($query) {
                $query->select('id', 'name_th', 'name_en');
            },
            'department' => function ($query) {
                $query->select('id', 'name_th', 'name_en');
            },
            'position' => function ($query) {
                $query->select('id', 'name_th');
            }
        ]);

        return $query->get();
    }

    public function findBy(array $criteria)
    {
        return ReserveFund::where($criteria)->first();
    }
    public function findAmountByEmpId($emp_id)
    {
        return ReserveFund::where('emp_id', $emp_id)
            ->latest()
            ->select('accumulate_balance')
            ->first();
    }
    public function updateAccumulateBalance($empId, $newBalance)
{
    return ReserveFund::where('emp_id', $empId)
                      ->update(['accumulate_balance' => $newBalance]);
}

    // public function getAll($params = null): Collection
    // {

    //     return $this->model
    //     ->where('record_status', '=', 1)
    //         ->where(function ($q1) use ($params) {
    //             if (isset($params['company_id']) && $params['company_id'] >= 1) {
    //                 $q1->where('company_id', '=', $params['company_id']);
    //             } elseif (isset($param['company_id']) && $param['company_id'] == 0) {
    //                 $q1->Where('company_id', '=', 6);
    //             }
    //             if (isset($param['department_id']) && $param['department_id'] >= 1) {
    //                 $q1->Where('department_id', '=', $param['department_id']);
    //             }
    //             if (isset($param['position_id']) && $param['position_id'] >= 1) {
    //                 $q1->Where('position_id', '=', $param['position_id']);
    //             }
    //         })
    //         ->with('company','position','department')
    //         ->get();
    // }
    public function getReserveFundByFilter($param)
    {
        return $this->model
        ->where('emp_id', '=', $param['emp_id'])
        ->where(function ($q) use ($param) {
            if(isset($param['day']) &&  $param['day'] > 0) {
                $q->where('day', "=", $param['day']);
            }
            if(isset($param['month']) &&  $param['month'] > 0) {
                $q->where('month', "=", $param['month']);
            }
            if(isset($param['year']) &&  $param['year'] > 0) {
                $q->where('year', "=", $param['year']);
            }
            if (isset($param['startDate']) && isset($param['endDate'])) {
                $q->whereRaw("DATE_FORMAT(created_at, '%Y-%m') BETWEEN '{$param['startDate']}' AND '{$param['endDate']}'");
            }
        })

        ->get();
    }

    public function getById($id)
    {
        return $this->model->where('emp_id', $id)
        ->get();
    }
}
