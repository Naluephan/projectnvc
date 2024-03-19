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
        return $this->model->get();
        // return $this->model->where('rd_user_id', $params['rd_user_id'])->with('sale_data', 'customer_data')->get();
    }

}
