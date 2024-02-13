<?php


namespace App\Repositories\Impl;

use App\Models\EmployeeLeaveQuotas;
use App\Repositories\EmployeeLeaveQuotasInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;
use App\Http\Controllers\APIs\ApiStatus;

class EmployeeLeaveQuotasRepository extends BaseRepository implements EmployeeLeaveQuotasInterface
{
    protected $model;

    public function __construct(EmployeeLeaveQuotas $model)
    {
        parent::__construct($model);
    }

    public function employeeLeaveQuotas($data)
    {
        $empId = $data['emp_id'];

        return DB::select("
        SELECT
            e.emp_id,
            t.leave_type_name,
            COALESCE(SUM(CASE WHEN l.leave_type_id IS NOT NULL THEN l.leave_day ELSE 0 END), 0) AS sum_leave_days
        FROM
            (SELECT DISTINCT emp_id FROM employee_leave_quotas WHERE emp_id = :empId) e
            CROSS JOIN
            emp_leave_type t
            LEFT JOIN
            employee_leaves l ON e.emp_id = l.emp_id AND t.id = l.leave_type_id AND l.status_hr__approve = 1
        GROUP BY
            e.emp_id, t.leave_type_name
        ORDER BY
            t.id
    ", ['empId' => $empId]);
    }
}
