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
        $query = $this->model->query();

        if (isset($params['emp_id'])) {
            $query->where('emp_id', $params['emp_id']);
        }

        if (isset($params['company_id'])) {
            $query->where('company_id', $params['company_id']);
        }

        if (isset($params['department_id'])) {
            $query->where('department_id', $params['department_id']);
        }

        $query->with([
            'company' => function ($query) {
                $query->select('id', 'name_th', 'name_en');
            },
            'department' => function ($query) {
                $query->select('id', 'name_th', 'name_en');
            }
        ]);

        return $query->get();
    }
}
