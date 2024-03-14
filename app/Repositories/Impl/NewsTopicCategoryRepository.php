<?php


namespace App\Repositories\Impl;


use App\Models\NewsTopicCategory;
use App\Repositories\NewsTopicCategoryInterface;
use Illuminate\Support\Collection;

class NewsTopicCategoryRepository extends MasterRepository implements NewsTopicCategoryInterface
{
    protected $model;

    public function __construct(NewsTopicCategory $model)
    {
        parent::__construct($model);
    }
    public function getAll(){
        return $this->model->get();
    }

}
