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
            // ->where(function ($q) use ($params) {
                
            // })
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
