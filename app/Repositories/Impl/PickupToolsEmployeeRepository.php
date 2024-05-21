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

    public function option($params)
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

        $query->where('status_approved', 2)->with([
            'company' => function ($query) {
                $query->select('id', 'name_th', 'name_en');
            },
            'department' => function ($query) {
                $query->select('id', 'name_th', 'name_en');
            }
        ]);

        return $query->get();
    }

    public function pickupToolsList($params)
    {
        $empId = $params['emp_id'];

        $listPickup_tools = DB::table('pickup_tools_employees AS pte')
            ->join('pickup_tools AS pt', 'pt.id', '=', 'pte.pickup_tools_id')
            ->join('pickup_tools_device_types AS ptt', 'ptt.id', '=', 'pt.device_types_id')
            ->join('employees AS e', 'e.id', '=', 'pte.emp_id')
            ->join('departments AS d', 'd.id', '=', 'e.department_id')
            ->join('companies AS c', 'c.id', '=', 'e.company_id')
            ->select(
                'pte.id',
                'pte.emp_id',
                'pte.pickup_tools_id',
                'ptt.device_types_name',
                'ptt.unit',
                'ptt.image',
                'pte.request_details',
                'pt.number_requested AS number_requested_limit',
                'pte.number_requested',
                'pte.status_approved',
                'pte.created_at',
                'pte.updated_at',
                'pte.approve_at',
                'pte.cancel_at',
                'pte.reject_at',
                'ptt.registration_number',
                'pte.status_repair',
            )
            ->where('pte.emp_id', '=', $empId)
            ->whereIn('pte.type_device', [1, 3])
            ->orderBy('pte.id', 'asc')
            ->get();

        return $listPickup_tools;
    }

    public function findBy(array $criteria)
    {
        return PickupToolsEmployee::where($criteria)->first();
    }

    public function myPickupToolsList($params)
    {
        $empId = $params['emp_id'];

        $listPickup_tools = DB::table('pickup_tools_employees AS pte')
            ->join('pickup_tools AS pt', 'pt.id', '=', 'pte.pickup_tools_id')
            ->join('pickup_tools_device_types AS ptt', 'ptt.id', '=', 'pt.device_types_id')
            ->join('employees AS e', 'e.id', '=', 'pte.emp_id')
            ->join('departments AS d', 'd.id', '=', 'e.department_id')
            ->join('companies AS c', 'c.id', '=', 'e.company_id')
            ->select(
                'pte.id',
                'pte.emp_id',
                'pte.pickup_tools_id',
                'ptt.device_types_name',
                'ptt.unit',
                'ptt.image',
                'pte.request_details',
                'pt.number_requested AS number_requested_limit',
                'pte.number_requested',
                'pte.status_approved',
                'pte.created_at',
                'pte.updated_at',
                'pte.approve_at',
                'pte.cancel_at',
                'pte.reject_at',
                'ptt.registration_number',
                'pte.status_repair',
            )
            ->where('pte.emp_id', '=', $empId)
            ->where('pte.status_approved', 2)
            ->whereIn('pte.status_repair', [2, 1])
            ->whereIn('pte.type_device', [2, 3])
            ->orderBy('pte.id', 'asc')
            ->get();

        return $listPickup_tools;
    }

    public function allMyPickupToolsList($params)
    {
        $empId = $params['emp_id'];

        $listPickup_tools = DB::table('pickup_tools_employees AS pte')
            ->join('pickup_tools AS pt', 'pt.id', '=', 'pte.pickup_tools_id')
            ->join('pickup_tools_device_types AS ptt', 'ptt.id', '=', 'pt.device_types_id')
            ->join('employees AS e', 'e.id', '=', 'pte.emp_id')
            ->join('departments AS d', 'd.id', '=', 'e.department_id')
            ->join('companies AS c', 'c.id', '=', 'e.company_id')
            ->select(
                'pte.id',
                'pte.emp_id',
                'pte.pickup_tools_id',
                'ptt.device_types_name',
                'ptt.unit',
                'ptt.image',
                'pte.request_details',
                'pt.number_requested AS number_requested_limit',
                'pte.number_requested',
                'pte.status_approved',
                'pte.created_at',
                'pte.updated_at',
                'pte.approve_at',
                'pte.cancel_at',
                'pte.reject_at',
                'ptt.registration_number',
                'pte.status_repair',
            )
            ->where('pte.emp_id', '=', $empId)
            ->whereIn('pte.type_device', [2, 3])
            ->orderBy('pte.id', 'asc')
            ->get();

        return $listPickup_tools;
    }

    public function findExistingRequest($empId, $pickupToolsId)
    {
        return $this->model
            ->where('emp_id', $empId)
            ->where('pickup_tools_id', $pickupToolsId)
            ->where('status_approved', 0)
            ->first();
    }
}
