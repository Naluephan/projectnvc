<?php


namespace App\Repositories\Impl;


use App\Models\SalaryTemplateDetail;
use App\Repositories\SalaryTemplateDetailInterface;
use Illuminate\Support\Collection;

class SalaryTemplateDetailRepository extends BaseRepository implements SalaryTemplateDetailInterface
{
    protected $model;

    public function __construct(SalaryTemplateDetail $model)
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
            ->with('templateSalary')
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
            ->with('templateSalary')
            ->select('*')
            ->skip($params['start'])
            ->take($params['rowperpage'])
            ->get();
    }
   
    public function checkListTemplateDetail($id)
    {
        return $this->model
        ->where('id','=',$id )
        ->first();
    }

    public function updateListTemplateDetail($id,$data_update)
    {
        $response = $this->model->where('id','=',$id )->first();
        if($response){
            $response->template_id = $data_update['template_id'];
            $response->detail = $data_update['detail'];
            $response->position = $data_update['position'];
            $response->type = $data_update['type'];
            $response->save();
        }
    }

    public function getByTemplateId($id)
    {
        return $this->model
        ->where('template_id','=',$id )
        ->get();
    }
}
