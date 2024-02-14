<?php


namespace App\Repositories\Impl;

use App\Models\EmployeeLeaveQuotas;
use App\Repositories\EmployeeLeaveQuotasInterface;
use Illuminate\Support\Facades\DB;

class EmployeeLeaveQuotasRepository extends BaseRepository implements EmployeeLeaveQuotasInterface
{
    protected $model;

    public function __construct(EmployeeLeaveQuotas $model)
    {
        parent::__construct($model);
    }

    public function employeeLeaveQuotas($data)
    {
        try {
            if (!isset($data['emp_id'])) {
                throw new \Exception('Please enter emp_id');
            }

            $empId = $data['emp_id'];

            $leaveQuotas = DB::table('emp_leave_type AS t')
                ->leftJoin(DB::raw("(SELECT DISTINCT leave_type_id, quota, emp_id FROM employee_leave_quotas WHERE emp_id = $empId) AS e"), 't.id', '=', 'e.leave_type_id')
                ->leftJoin(DB::raw("(SELECT leave_type_id, leave_day FROM employee_leaves WHERE status_hr__approve = 1 AND emp_id = $empId) AS l"), 't.id', '=', 'l.leave_type_id')
                ->select('e.emp_id', 't.leave_type_name', DB::raw('SUM(CASE WHEN l.leave_type_id IS NOT NULL THEN l.leave_day ELSE 0 END) AS use_leave_days'), 'e.quota AS all_quota')
                ->groupBy('e.emp_id', 't.leave_type_name', 'e.quota')
                ->orderBy('t.id', 'ASC')
                ->get();

            return $leaveQuotas;
        } catch (\Exception $ex) {
            return ['error' => $ex->getMessage()];
        }
    }
}
