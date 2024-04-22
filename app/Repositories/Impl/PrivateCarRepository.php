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
        // return $this->model->where('record_status', 1)
        //     ->where('emp_id', $params['emp_id'])
        //     ->get();

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

        $query->where('record_status', 1)->with([
            'company' => function ($query) {
                $query->select('id', 'name_th', 'name_en');
            },
            'department' => function ($query) {
                $query->select('id', 'name_th', 'name_en');
            }
        ]);

        return $query->get();
    }

    public function findBy(array $criteria)
    {
        return PrivateCar::where($criteria)->first();
    }
}
