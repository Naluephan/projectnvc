<?php


namespace App\Repositories\Impl;

use App\Models\RewardCoin;
use App\Repositories\RewardCoinInterface;
use Illuminate\Support\Collection;
use Carbon\Carbon;

class RewardCoinRepository extends MasterRepository implements RewardCoinInterface
{
    protected $model;

    public function __construct(RewardCoin $model)
    {
        parent::__construct($model);
    }
    public function rewardCoin($param)
    {
            $data = $this->model->get();
            return $data;

    }

    public function getAll($params = null) : Collection
    {

        return $this->model
            ->where(function($q) use ($params){
                if(isset($params['searchValue'])){
                    $q->where('reward_name','like','%'.$params['searchValue'].'%');
                }
            })  
            ->get();
        }
        public function paginate($params): Collection
    {
        return $this->model
        ->where(function($q) use ($params){
            if(isset($params['searchValue'])){
                $q->where('reward_name','like','%'.$params['searchValue'].'%');
            }
        })  
            ->select('*')
            ->skip($params['start'])
            ->take($params['rowperpage'])
            ->get();
    }
}
