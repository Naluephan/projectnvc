<?php


namespace App\Repositories\Impl;

use App\Models\ReserveFund;
use App\Models\WithdrawReverseFund;
use App\Repositories\WithdrawReserveFundInterface;
use Illuminate\Support\Collection;

class WithdrawReserveFundRepository extends MasterRepository implements WithdrawReserveFundInterface
{
    protected $model;

    public function __construct(WithdrawReverseFund $model)
    {
        parent::__construct($model);
    }

    public function getWithdraw($params)
    {
        return $this->model
            ->where('reserve_request', 5)
            // ->where('emp_id', $params['emp_id'])
            ->with('withdraw')
            ->get();
    }

    public function findBy(array $criteria)
    {
        return WithdrawReverseFund::where($criteria)->first();
    }
    public function findAmountByEmpId($emp_id)
    {
        return ReserveFund::where('emp_id', $emp_id)
        ->select('accumulate_balance')
        ->orderBy('created_at', 'desc')
        ->first();
    }
}
