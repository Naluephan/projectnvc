<?php


namespace App\Repositories\Impl;

use App\Models\AssetCategory;
use App\Repositories\AssetCategoryInterface;
use Illuminate\Support\Collection;

class AssetCategoryRepository extends MasterRepository implements AssetCategoryInterface
{
    protected $model;

    public function __construct(AssetCategory $model)
    {
        parent::__construct($model);
    }

    public function getAll(){
        return $this->model->get();
    }

}
