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
        return $this->model->where('record_status', 1)
        // ->where('emp_id', $params['emp_id'])
            ->with('honortype')
            ->get();
    }

    public function findBy(array $criteria)
    { 
        return
        Honor::where($criteria)->first();
    }
    public function getHonorById($id)
    {
        return $this->model->where('emp_id', $id)
        ->with('emp')
        ->get();
    }
}
