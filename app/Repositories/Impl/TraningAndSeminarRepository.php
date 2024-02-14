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
                    $q->where('title','like','%'.$params['searchValue'].'%');
                }
            })
            ->get();
        }
        public function paginate($params): Collection
    {
        return $this->model
            ->where(function($q) use ($params){
                if(isset($params['searchValue'])){
                    $q->where('title','like','%'.$params['searchValue'].'%');
                }
            })
            ->select('*')
            ->skip($params['start'])
            ->take($params['rowperpage'])
            ->get();
    }


}
