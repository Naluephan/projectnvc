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

    public function getInsuranceById($id)
    {
        return $this->model->where('emp_id', $id)
        ->with('emp')
        ->get();
    }

    public function getGroupInsuranceByFilter($param)
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
        ->with('emp')
        ->with('position')
        ->with('department')
        ->with('company')

        ->get();
    }
}
