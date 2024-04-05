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
        $empId = $params['emp_id'];

        return $this->model->where('emp_id', $empId)
            ->with([
                'pickupTools' => function ($query) {
                    $query->select('id', 'department_id', 'device_types_id','number_requested AS limit_number_requested');
                },
                'pickupTools.pickupToolsDeviceType' => function ($query) {
                    $query->select('id', 'device_types_name', 'unit');
                },
                'pickupTools.department' => function ($query) {
                    $query->select('id', 'name_th');
                }
            ])->get();
    }
}