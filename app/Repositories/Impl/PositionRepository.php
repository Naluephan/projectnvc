<?php


namespace App\Repositories\Impl;


use App\Models\Position;
use App\Repositories\PositionInterface;
use Illuminate\Support\Collection;

class PositionRepository extends MasterRepository implements PositionInterface
{
    protected $model;

    public function __construct(Position $model)
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
                if(isset($params['department_id']) && $params['department_id'] >= 1){
                    $q->where('department_id','=',$params['department_id']);
                }
//                $q->whereHas('sdqDetails',function($q2) use ($params){
//                    $q2->where();
//                });
            })
            ->with('department','company')
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
            ->with('department','company')
            ->select('*')
            ->skip($params['start'])
            ->take($params['rowperpage'])
            ->get();
    }

    public function all() : Collection 
    {
        return $this->model
            ->get();
    }
   
}
