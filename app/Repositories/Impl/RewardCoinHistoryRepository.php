<?php


namespace App\Repositories\Impl;

use App\Models\RewardCoinHistory;
use App\Repositories\RewardCoinHistoryInterface;

class RewardCoinHistoryRepository extends MasterRepository implements RewardCoinHistoryInterface
{
    protected $model;

    public function __construct(RewardCoinHistory $model)
    {
        parent::__construct($model);
    }

    public function getAll()
    {
        return $this->model
            ->select([
                'id',
                'type_reward',
                'reward_name',
                'reward_image',
                'reward_coins_change',
                'record_status',
                'created_at',
                'updated_at'
            ])
            ->get();
    }

    public function findBy($params)
    {
        return $this->model->where('emp_id', $params['emp_id'])->get();
    }
}
