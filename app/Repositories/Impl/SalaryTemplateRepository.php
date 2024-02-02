<?php


namespace App\Repositories\Impl;

use App\Models\SalaryTemplate;
use App\Models\SalaryTemplateDetail;
use App\Repositories\SalaryTemplateInterface;
use Illuminate\Support\Collection;

class SalaryTemplateRepository extends BaseRepository implements SalaryTemplateInterface
{
    protected $model;

    public function __construct(SalaryTemplate $model)
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
