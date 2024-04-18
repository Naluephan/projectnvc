<?php


namespace App\Repositories\Impl;


use App\Models\PickupToolsEmployee;
use App\Repositories\PickupToolsEmployeeInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class PickupToolsEmployeeRepository extends MasterRepository implements PickupToolsEmployeeInterface
{
    protected $model;

    public function __construct(PickupToolsEmployee $model)
    {
        parent::__construct($model);
    }

    public function pickupToolsList($params)
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
            },
            'pickupTools.pickupToolsDeviceType' => function ($query) {
                $query->select('id', 'device_types_name', 'unit');
            }
        ]);

        if (!empty($params)) {
            return $query->get();
        } else {
            return null;
        }
    }

    public function findBy(array $criteria)
    {
        return PickupToolsEmployee::where($criteria)->first();
    }

    public function createCondition($params)
    {
        $existingData = $this->model->where('pickup_tools_id', $params['pickup_tools_id'])
            ->where('emp_id', $params['emp_id'])
            ->first();

        if ($existingData) {
            $existingData->number_requested += $params['number_requested'];
            $existingData->save();
            return $existingData;
        } else {
            return $this->model->create($params);
        }
    }
}
