<?php


namespace App\Repositories\Impl;


use App\Models\TraningAndSeminar;
use App\Repositories\TraningAndSeminarInterface;
use Illuminate\Support\Collection;

class TraningAndSeminarRepository extends MasterRepository implements TraningAndSeminarInterface
{
    protected $model;

    public function __construct(TraningAndSeminar $model)
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
//                $q->whereHas('sdqDetails',function($q2) use ($params){
//                    $q2->where();
//                });
            })
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
            ->select('*')
            ->skip($params['start'])
            ->take($params['rowperpage'])
            ->get();
    }


}
