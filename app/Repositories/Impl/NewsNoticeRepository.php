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

    public function news_notice_employee_paginate($param)
    {
        return $this->model->with('newsType')
            ->orderBy('record_status', 'desc')
            ->orderBy($param['columnName'], $param['columnSortOrder'])
            ->where('record_status', 1)
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
            ->where('record_status', 1)
            ->where(function ($q) use ($param) {
                if (isset($param['searchValue'])) {
                    $q->where('news_notice_name', 'like', '%' . $param['searchValue'] . '%');
                }
                if (isset($param['id'])) {
                    $q->where('id', '-', $param['id']);
                }
            })
            ->with('newsType')
            ->get();
    }


}
