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

    public function searchNewsById($params)
    {
        $newsId = $params['news_id'];

        $leaveQuotas = DB::table('news_notices AS n')
            ->join('news_types AS nc', 'nc.id', '=', 'n.notice_category_id')
            ->select(
                'n.id',
                'n.news_notice_name AS announcement_topic',
                'n.news_notice_description AS announcement_content',
                'n.news_img1',
                'n.news_img2',
                'n.news_img3',
                'nc.id AS category_id',
                'nc.name_category AS category',
                'n.created_at AS add_date',
                'n.record_status',
            )
            ->where('n.id', $newsId)
            ->get();

        return $leaveQuotas;
    }


    public function getAll()
    {
        $leaveQuotas = DB::table('news_notices AS n')
            ->join('news_types AS nc', 'nc.id', '=', 'n.notice_category_id')
            // ->join('employees AS e', 'e.id', '=', 'n.announcer_id')
            ->select(
                'n.id',
                'n.news_notice_name AS announcement_topic',
                'n.news_notice_description AS announcement_content',
                'n.news_img1',
                'n.news_img2',
                'n.news_img3',
                'nc.id AS category_id',
                'nc.name_category AS category',
                'n.created_at AS add_date',
                // DB::raw("CONCAT(e.f_name, ' ', e.l_name) AS announcer_name"),
                'n.record_status',
            )
            ->get();

        return $leaveQuotas;
    }
}
