<?php


namespace App\Repositories\Impl;


use App\Models\TransactionHistory;
use App\Repositories\TransactionHistoryInterface;
use Illuminate\Support\Collection;

class TransactionHistoryRepository extends MasterRepository implements TransactionHistoryInterface
{
    protected $model;

    public function __construct(TransactionHistory $model)
    {
        parent::__construct($model);
    }

    public function transactionListApp($params)
    {
        return $this->model
            ->where('emp_id', '=', $params['emp_id'])
            ->where(function ($q) use ($params) {
                if (isset($params['step_status'])== 1) {
                    $q->where('step_status', '=', 4);
                }else{
                    $q->where('step_status', '!=', 4);
                }
            })
            ->get();
    }
}
