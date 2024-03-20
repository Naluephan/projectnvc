<?php


namespace App\Repositories\Impl;


use App\Models\PrivateCar;
use App\Repositories\PrivateCarInterface;
use Illuminate\Support\Collection;

class PrivateCarRepository extends MasterRepository implements PrivateCarInterface
{
    protected $model;

    public function __construct(PrivateCar $model)
    {
        parent::__construct($model);
    }

    public function getPrivatecar($params)
    {
        return $this->model->where('record_status', 1)
            ->where('emp_id', $params['emp_id'])
            ->get();
    }

    public function findBy(array $criteria)
    {
        return PrivateCar::where($criteria)->first();
    }
}
