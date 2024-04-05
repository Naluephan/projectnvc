<?php


namespace App\Repositories\Impl;

use App\Models\GroupInsurance;
use App\Repositories\GroupInsuranceInterface;
use Illuminate\Support\Collection;

class GroupInsuranceRepository extends MasterRepository implements GroupInsuranceInterface
{
    protected $model;

    public function __construct(GroupInsurance $model)
    {
        parent::__construct($model);
    }

    public function getGroupInsurance($params)
    {
        return $this->model
            ->where('record_status', 1)
            // ->where('emp_id', $params['emp_id'])
            ->with('emp')
            ->get();
    }

    public function findBy(array $criteria)
    {
        return GroupInsurance::where($criteria)->first();
    }
}
