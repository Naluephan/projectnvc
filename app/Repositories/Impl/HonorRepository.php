<?php


namespace App\Repositories\Impl;


use App\Models\Honor;
use App\Repositories\HonorInterface;
use Illuminate\Support\Collection;

class HonorRepository extends MasterRepository implements HonorInterface
{
    protected $model;

    public function __construct(Honor $model)
    {
        parent::__construct($model);
    }

    public function getHonor($params)
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
        if (isset($params['honor_category_id'])) {
            $query->where('honor_category_id', $params['honor_category_id']);
        }
        

        $query->where('approve_status', 2)->with([
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
        return
        Honor::where($criteria)->first();
    }
    public function getHonorById($id)
    {
        return $this->model->where('emp_id', $id)
        // ->with('honortype')
        ->get();
    }
}
