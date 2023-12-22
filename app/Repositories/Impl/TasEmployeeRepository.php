<?php


namespace App\Repositories\Impl;


use App\Models\TasEmployees;
use App\Repositories\TasEmployeeInterface;
use Illuminate\Support\Collection;

class TasEmployeeRepository extends MasterRepository implements TasEmployeeInterface
{
    protected $model;

    public function __construct(TasEmployees $model)
    {
        parent::__construct($model);
    }

    public function checkListEmployees($emp_id,$tas_id)
    {
        return $this->model
        ->where('emp_id','=',$emp_id)
        ->where('tas_id','=',$tas_id)
        ->first();
    }
   
    public function updateListEmployees($emp_id,$tas_id,$data_update)
    {
        $response = $this->model->where('emp_id','=', $emp_id)->where('tas_id','=',$tas_id)->first();
        if($response){
            $response->remark1 = $data_update['remark1'];
            $response->remark2 = $data_update['remark2'];
            $response->remark3 = $data_update['remark3'];
            $response->save();
        }
    }

    public function getAll($params) : Collection
    {

        return $this->model
            ->where(function($q) use ($params){
                if(isset($params['searchValue'])){
                    $q->where('new_detail','like','%'.$params['searchValue'].'%');
                }
                if(isset($params['id'])){
                    $q->where('id','=',$params['id']);
                }
                if(isset($params['tas_id'])){
                    $q->where('tas_id','=',$params['tas_id']);
                }
//                $q->whereHas('sdqDetails',function($q2) use ($params){
//                    $q2->where();
//                });
            })
            ->with('employees.department')
            ->with('employees.position')
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
                    $q->where('id','=',$params['id']);
                }
                if(isset($params['tas_id'])){
                    $q->where('tas_id','=',$params['tas_id']);
                }
//                $q->whereHas('sdqDetails',function($q2) use ($params){
//                    $q2->where();
//                });
            })
            ->with('employees.department')
            ->with('employees.position')
            ->select('*')
            ->skip($params['start'])
            ->take($params['rowperpage'])
            ->get();
    }
}
