<?php


namespace App\Repositories\Impl;


use App\Models\SavingMoney;
use App\Repositories\SavingMoneyInterface;
use Illuminate\Support\Collection;

class SavingMoneyRepository extends MasterRepository implements SavingMoneyInterface
{
    protected $model;

    public function __construct(SavingMoney $model)
    {
        parent::__construct($model);
    }

    public function savingMoneyListApp($params)
    {
        return $this->model
            ->where('emp_id', '=', $params['emp_id'])
            ->where(function ($q) use ($params) {
                if(isset($params['save_status'])) {
                    $q->where('save_status', "=", $params['save_status']);
                }
                if(isset($params['approve_status'])) {
                    $q->where('approve_status', "=", $params['approve_status']);
                }
                if(isset($params['month']) &&  $params['month'] > 0) {
                    $q->where('month', "=", $params['month']);
                }
                if(isset($params['year']) &&  $params['year'] > 0) {
                    $q->where('year', "=", $params['year']);
                }
                if (isset($params['from_date']) && isset($params['to_date'])) {
                    $q->whereBetween('save_date', [$params['from_date'] . " 00:00:00", $params['to_date'] . " 23:59:59"]);
                }
                
            })
            ->get();
    }

    public function findAmountByEmpId($emp_id)
    {
        return $this->model
            ->where('emp_id', $emp_id)
            ->latest()
            ->select('total_amount')
            ->first();
    }
    
}
