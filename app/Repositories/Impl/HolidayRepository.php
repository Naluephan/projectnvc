<?php


namespace App\Repositories\Impl;


use App\Models\Holiday;
use App\Repositories\HolidayInterface;
use Illuminate\Support\Collection;

class HolidayRepository extends MasterRepository implements HolidayInterface
{
    protected $model;

    public function __construct(Holiday $model)
    {
        parent::__construct($model);
    }

    public function getAll($params = null) : Collection
    {

        return $this->model
            ->where(function($q) use ($params){
                if(isset($params['searchValue'])){
                    $q->where('holiday_name','like','%'.$params['searchValue'].'%');
                }
                
            })
            ->get();
        }
        public function paginate($params): Collection
    {
        return $this->model
        ->where(function($q) use ($params){
            if(isset($params['searchValue'])){
                $q->where('holiday_name','like','%'.$params['searchValue'].'%');
            }
            
        })
            ->select('*')
            ->skip($params['start'])
            ->take($params['rowperpage'])
            ->get();
    }
    public function findBy($holidayName)
{
    return $this->model->where('holiday_name', $holidayName)->exists();
}


}
