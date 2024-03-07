<?php


namespace App\Repositories\Impl;

use App\Models\News;
use App\Repositories\NewsInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class NewsRepository extends BaseRepository implements NewsInterface
{
    protected $model;

    public function __construct(News $model)
    {
        parent::__construct($model);
    }

    public function getAll()
    {
        $leaveQuotas = DB::table('news AS n')
            ->join('news_categories AS nc', 'nc.id', '=', 'n.newsCate_id')
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
