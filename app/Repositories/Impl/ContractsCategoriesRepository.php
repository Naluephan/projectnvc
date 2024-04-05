<?php

namespace App\Repositories\Impl;

use App\Models\ContractsCategories;
use App\Repositories\ContractsCategoriesInterface;
use Illuminate\Support\Collection;

class ContractsCategoriesRepository extends MasterRepository implements ContractsCategoriesInterface

{
    protected $model;
    public function __construct(ContractsCategories $model)
    {
        parent::__construct($model);
    }
    public function getAll()
    {
        return $this->model->get();
    }
}
