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
        $query = $this->model->query();

        if (isset($params['emp_id'])) {
            $query->where('emp_id', $params['emp_id']);
        }

        if (isset($params['company_id'])) {
            $query->where('company_id', $params['company_id']);
        }

        if (isset($params['department_id'])) {
            $query->where('department_id', $params['department_id']);
        }
        if (isset($params['position_id'])) {
            $query->where('position_id', $params['position_id']);
        }

        $query->where('record_status', 1)
        ->with([
            'company' => function ($query) {
                $query->select('id', 'name_th', 'name_en');
            },
            'department' => function ($query) {
                $query->select('id', 'name_th', 'name_en');
            },
            'position' => function ($query) {
                $query->select('id', 'name_th');
            }
        ]);

        return $query->get();
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
