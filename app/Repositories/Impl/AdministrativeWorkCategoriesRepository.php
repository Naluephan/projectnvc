<?php


namespace App\Repositories\Impl;


use App\Models\AdministrativeWorkCategories;
use App\Repositories\AdministrativeWorkCategoriesInterface;
use Illuminate\Support\Collection;

class AdministrativeWorkCategoriesRepository extends MasterRepository implements AdministrativeWorkCategoriesInterface
{
    protected $model;

    public function __construct(AdministrativeWorkCategories $model)
    {
        parent::__construct($model);
    }
    public function getAll(){
        return $this->model->get();
    }
    public function findByAdminist($administName)
    {
        return $this->model->where('administ_name', $administName)->exists();
    }

}
