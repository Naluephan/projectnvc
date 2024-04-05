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
}
