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
            ->join('departments AS d', 'd.id', '=', 'PT.department_id')
            ->select(
                'PT.id',
                'd.id AS department_id',
                'd.name_th AS department_name',
                'd.image_departments',
                'PTDT.device_types_name',
                'PT.number_requested',
                'PTDT.unit',
            )
            ->where('PT.department_id', '=', $departmentId)
            ->get();

        $totalCount = $showDetail->count();

        return ['show_detail' => $showDetail, 'total_count' => $totalCount];
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
            ->get();

        return $showDetail;
    }

    public function createCondition($params)
    {
        $newId = $params['new_id'];
        $empId = $params['emp_id'];

        $affectedRows = DB::table('news_notice_employees')
            ->where('emp_id', $empId)
            ->where('id', $newId)
            ->update(['read_or_not' => 1]);

        return $affectedRows;
    }

    public function getAll()
    {
        $leaveQuotas = DB::table('news AS n')
            ->join('news_types AS nc', 'nc.id', '=', 'n.newsCate_id')
            ->join('employees AS e', 'e.id', '=', 'n.announcer_id')
            ->select(
                'n.id',
                'n.name_news AS announcement_topic',
                'n.news_description AS announcement_content',
                'n.news_img1',
                'n.news_img2',
                'n.news_img3',
                'nc.id AS category_id',
                'nc.name_category AS category',
                'n.created_at AS add_date',
                'n.published_at AS start_date',
                'n.cancelled_at AS end_date',
                DB::raw("CONCAT(e.f_name, ' ', e.l_name) AS announcer_name"),
                'n.record_status',
            )
            ->get();

        return $leaveQuotas;
    }
}
