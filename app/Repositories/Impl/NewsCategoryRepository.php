<?php


namespace App\Repositories\Impl;


use App\Models\NewsCategory;
use App\Repositories\NewsCategoryInterface;
use Illuminate\Support\Collection;

class NewsCategoryRepository extends MasterRepository implements NewsCategoryInterface
// class NewsCategoryRepository extends BaseRepository implements NewsCategoryInterface
{
    protected $model;

    public function __construct(NewsCategory $model)
    {
        parent::__construct($model);
    }
    public function getAll(){
        return $this->model->get();
    }

}
