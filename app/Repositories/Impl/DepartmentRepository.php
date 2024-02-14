<?php


namespace App\Repositories\Impl;


use App\Models\Department;
use App\Repositories\DepartmentInterface;
use Illuminate\Support\Collection;

class DepartmentRepository extends MasterRepository implements DepartmentInterface
{
    protected $model;

    public function __construct(Department $model)
    {
        parent::__construct($model);
    }

    public function getAll($params = null) : Collection
    {

        return $this->model
            ->where(function($q) use ($params){
                if(isset($params['searchValue'])){
                    $q->where('name_th','like','%'.$params['searchValue'].'%');
                    $q->orWhere('name_en','like','%'.$params['searchValue'].'%');
                }
            })
            ->where(function ($q1) use ($params) {
                if(isset($params['company_id']) && $params['company_id'] >= 1){
                    $q1->where('company_id','=',$params['company_id']);
                }
            })
            ->with('company') 
            ->get();
        }
        public function paginate($params): Collection
    {
        return $this->model
        ->where(function($q) use ($params){
            if(isset($params['searchValue'])){
                $q->where('name_th','like','%'.$params['searchValue'].'%');
                $q->orWhere('name_en','like','%'.$params['searchValue'].'%');
            }
        })
        ->where(function ($q1) use ($params) {
            if(isset($params['company_id']) && $params['company_id'] >= 1){
                $q1->where('company_id','=',$params['company_id']);
            }
        })
            ->with('company')
            ->select('*')
            ->skip($params['start'])
            ->take($params['rowperpage'])
            ->get();
    }

    public function getDepartmentInCompany($company_id)
    {
        return $this->model
        ->where('company_id','=',$company_id)
        ->get();
    }

    public function all() : Collection 
    {
        return $this->model
            ->get();
    }


}
