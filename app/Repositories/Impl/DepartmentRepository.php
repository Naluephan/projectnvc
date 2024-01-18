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
                    $q->where('new_detail','like','%'.$params['searchValue'].'%');
                }
                if(isset($params['id'])){
                    $q->where('id','-',$params['id']);
                }
                if(isset($params['company_id']) && $params['company_id'] >= 1){
                    $q->where('company_id','=',$params['company_id']);
                }
//                $q->whereHas('sdqDetails',function($q2) use ($params){
//                    $q2->where();
//                });
            })
            ->with('company') 
            ->get();
        }
        public function paginate($params): Collection
    {
        return $this->model
            ->where(function($q) use ($params){
                if(isset($params['searchValue'])){
                    $q->where('new_detail','like','%'.$params['searchValue'].'%');
                }
                if(isset($params['id'])){
                    $q->where('id','-',$params['id']);
                }
//                $q->whereHas('sdqDetails',function($q2) use ($params){
//                    $q2->where();
//                });
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
