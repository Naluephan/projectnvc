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
        return $this->model
            ->where('record_status', 1)
            // ->where('emp_id', $params['emp_id'])
            ->with('emp')
            ->get();
    }

    public function findBy(array $criteria)
    {
        return ReserveFund::where($criteria)->first();
    }
    public function findAmountByEmpId($emp_id)
    {
        return $this->model
            ->where('emp_id', $emp_id)
            ->latest()
            ->select('accumulate_balance')
            ->first();
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
        ->where(function ($q) use ($param) {
            if(isset($param['position_id'])) {
                $q->where('position_id', "=", $param['position_id']);
            }
            if(isset($param['company_id'])) {
                $q->where('company_id', "=", $param['company_id']);
            }
            if(isset($param['department_id'])) {
                $q->where('department_id', "=", $param['department_id']);
            }
        })
        ->with('emp.company')
        ->with('emp.position')
        ->with('emp.department')

        ->get();
    }
}
