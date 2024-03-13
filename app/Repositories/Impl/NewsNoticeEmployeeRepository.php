<?php


namespace App\Repositories\Impl;

use App\Models\NewsNoticeEmployee;
use App\Repositories\NewsNoticeEmployeeInterface;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class NewsNoticeEmployeeRepository extends BaseRepository implements NewsNoticeEmployeeInterface
{
    protected $model;

    public function __construct(NewsNoticeEmployee $model)
    {
        parent::__construct($model);
    }

    public function getAll($params)
    {
        $empId = $params['emp_id'];

        $listNewsNotice = DB::table('news_notice_employees AS nne')
            ->join('employees AS e', 'e.id', '=', 'nne.emp_id')
            ->join('news_notices AS nn', 'nn.id', '=', 'nne.news_notice_id')
            ->join('news_types AS nc', 'nc.id', '=', 'nn.notice_category_id')
            ->select(
                'nne.id',
                'nne.news_notice_id',
                'e.id AS emp_id',
                'nc.id AS category_id',
                'nc.name_category AS category',
                'nn.news_notice_name',
                'nn.news_notice_description',
                'nn.news_priority',
                'nne.read_or_not',
                'nn.record_status',
                'nn.created_at',
                'nn.updated_at',
            )
            ->where('e.id', '=', $empId)
            ->whereDate('nn.created_at', '>=', Carbon::now()->subDays(7))
            ->orderBy('nn.news_priority', 'ASC')
            ->get();

        return $listNewsNotice;
    }

    public function deleteAll($id)
    {
        return $this->model->where('news_notice_id', '=', $id)->delete();
    }

    public function updateReadStatus($params)
    {
        $news_notice_id = $params['news_notice_id'];
        $empId = $params['emp_id'];

        $affectedRows = DB::table('news_notice_employees')
            ->where('emp_id', $empId)
            ->where('news_notice_id', $news_notice_id)
            ->update(['read_or_not' => 1]);

        return $affectedRows;
    }
}
