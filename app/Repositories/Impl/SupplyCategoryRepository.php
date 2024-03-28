<?php


namespace App\Repositories\Impl;


use App\Models\SupplyCategory;
use App\Repositories\SupplyCategoryInterface;
use Illuminate\Support\Collection;

class SupplyCategoryRepository extends MasterRepository implements SupplyCategoryInterface
{
    protected $model;

    public function __construct(SupplyCategory $model)
    {
        parent::__construct($model);
    }
public function getAll(){
    return $this->model->get();
}
public function findByToolsName($toolsName)
{
    return $this->model->where('category_name', $toolsName)->exists();
}

}
