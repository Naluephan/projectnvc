<?php


namespace App\Repositories\Impl;

use App\Models\NewsNotice;
use App\Repositories\NewsNoticeInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class NewsNoticeRepository extends BaseRepository implements NewsNoticeInterface
{
    protected $model;

    public function __construct(NewsNotice $model)
    {
        parent::__construct($model);
    }

    public function getAll()
    {
        $listNewsNotice = DB::table('news_notices AS n')
            ->join('news_categories AS nc', 'nc.id', '=', 'n.notice_category_id')
            ->select(
                'n.id',
                'nc.id AS category_id',
                'nc.name_category AS category',
                'n.news_notice_name',
                'n.news_notice_description',
                'n.news_priority',
                'n.record_status',
                'n.created_at',
                'n.updated_at',
            )
            ->whereDate('n.created_at', '>=', Carbon::now()->subDays(7))
            ->orderBy('n.news_priority', 'asc')
            ->get();

        return $listNewsNotice;
    }

    public function news_notice_employee_paginate($param)
    {
        return $this->model->with('newsCategory')
            ->orderBy('record_status', 'desc')
            ->orderBy($param['columnName'], $param['columnSortOrder'])
            ->where(function ($q) use ($param) {
                if (isset($param['searchValue'])) {
                    $q->where('news_notice_name', 'like', '%' . $param['searchValue'] . '%');
                }
                if (isset($param['id'])) {
                    $q->where('id', '-', $param['id']);
                }
            })
            ->select('*')
            ->skip($param['start'])
            ->take($param['rowperpage'])
            ->get();
    }

    public function news_notice_employee_getAll($param)
    {
        return $this->model
            ->select('*')
            ->where(function ($q) use ($param) {
                if (isset($param['searchValue'])) {
                    $q->where('news_notice_name', 'like', '%' . $param['searchValue'] . '%');
                }
                if (isset($param['id'])) {
                    $q->where('id', '-', $param['id']);
                }
            })
            ->with('newsCategory')
            ->get();
    }
}
