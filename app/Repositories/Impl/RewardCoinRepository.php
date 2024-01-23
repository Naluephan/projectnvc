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
    public function rewardCoin($param){
        $data = $this->model->where([
            ['id' ,'=', $param['id']],
        ])->first();
        return $data;
    }
    
}

    

