<?php


namespace App\Repositories\Impl;

use App\Models\PickupTools;
use App\Repositories\PickupToolsInterface;
use Illuminate\Support\Facades\DB;

class PickupToolsRepository extends BaseRepository implements PickupToolsInterface
{
    protected $model;

    public function __construct(PickupTools $model)
    {
        parent::__construct($model);
    }

    public function allList($params)
    {
        return $this->model->with('department')
            ->selectRaw('department_id, COUNT(department_id) AS count')
            ->groupBy('department_id')
            ->orderByDesc('updated_at')
            ->get();
    }



    public function deleteCondition($params)
    {
        return $this->model->where('department_id', $params['department_id'])->delete();
    }

    public function createCondition($params)
    {
        $existingData = $this->model->where('device_types_id', $params['device_types_id'])
            ->where('department_id', $params['department_id'])
            ->first();

        if ($existingData) {
            $existingData->number_requested += $params['number_requested'];
            $existingData->save();
            return $existingData;
        } else {
            return $this->model->create($params);
        }
    }

    public function deleteNotIn($ids, $department_id)
    {
        $query = $this->model->where('department_id', $department_id);

        if ($ids !== null) {
            $query->whereNotIn('id', $ids);
        }

        return $query->delete();
    }

    public function updateCondition($params)
    {
        $existingData = $this->model->where('device_types_id', $params['device_types_id'])
            // ->where('department_id', $params['department_id'])
            ->first();

        if ($existingData) {
            $existingData->number_requested += $params['number_requested'];
            $existingData->save();
            return $existingData;
        }
    }
}
