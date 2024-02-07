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
        try {
            $empId = $data['emp_id'];

            return DB::select("
            SELECT
                t.id,
                t.leave_type_name,
                COALESCE(SUM(CASE WHEN l.leave_type_id IS NOT NULL THEN l.leave_day ELSE 0 END), 0) AS sum_leave_days,
                -- COALESCE(SUM(CASE WHEN l.leave_type_id IS NOT NULL THEN l.leave_hours ELSE 0 END), 0) AS sum_leave_hours,
                q.quota-- ,
                -- q.year_quota
            FROM
                (SELECT DISTINCT emp_id FROM employee_leaves WHERE emp_id = $empId) AS e
                CROSS JOIN
                emp_leave_type AS t
                LEFT JOIN
                employee_leaves AS l ON e.emp_id = l.emp_id AND t.id = l.leave_type_id
                    AND l.status_hr__approve = 1
                LEFT JOIN
                employee_leave_quotas AS q ON q.id = l.leave_type_id
            GROUP BY
                t.id, t.leave_type_name, q.quota-- , q.year_quota
            ORDER BY
                t.id ASC
        ");
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::leaveQuotase_error_statusCode;
            $result['errCode'] = ApiStatus::leaveQuotase_error_status;
            $result['errDesc'] = ApiStatus::leaveQuotase_errDesc;
            $result['message'] = $e->getMessage();
        }
    }
}
