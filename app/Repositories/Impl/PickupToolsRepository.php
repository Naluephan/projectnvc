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

    public function showDetailBydepartment($params)
    {
        $departmentId = $params['department_id'];

        $showDetail = DB::table('pickup_tools AS PT')
            ->join('pickup_tools_device_types AS PTDT', 'PTDT.id', '=', 'PT.device_types_id')
            ->select(
                'PT.id',
                'PTDT.device_types_name',
                'PT.number_requested',
                'PTDT.unit',
            )
            ->where('PT.department_id', '=', $departmentId)
            ->get();


        return $showDetail;
    }

    public function allList($params)
    {
        $showDetail = DB::table('pickup_tools AS PT')
            ->join('pickup_tools_device_types AS PTDT', 'PTDT.id', '=', 'PT.device_types_id')
            ->join('departments AS d', 'd.id', '=', 'PT.department_id')
            ->select(
                'PT.department_id',
                'd.name_th AS department_name',
                'd.image_departments',
                DB::raw('COUNT(PT.department_id) AS department_count')
            )
            ->groupBy('PT.department_id', 'd.name_th', 'd.image_departments')
            ->orderBy('PT.updated_at', 'desc')
            ->get();

        return $showDetail;
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

    public function detailDepartmentById($params)
    {
        $departmentId = $params['department_id'];

        $listDetailDepartment = DB::table('pickup_tools AS PT')
            ->join('pickup_tools_device_types AS PTDT', 'PTDT.id', '=', 'PT.device_types_id')
            ->join('departments AS d', 'd.id', '=', 'PT.department_id')
            ->select(
                'PT.department_id',
                'd.name_th AS department_name',
                'd.image_departments',
                DB::raw('COUNT(PT.department_id) AS department_count')
            )
            ->where('PT.department_id', '=', $departmentId)
            ->groupBy('PT.department_id', 'd.name_th', 'd.image_departments')
            ->get();

        return $listDetailDepartment;
    }
}
