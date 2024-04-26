<?php

namespace App\Repositories\Impl;

use App\Models\Contracts;
use App\Repositories\ContractsInterface;
use Illuminate\Support\Collection;

class ContractsRepository extends MasterRepository implements ContractsInterface

{
    protected $model;
    public function __construct(Contracts $model)
    {
        parent::__construct($model);
    }
    public function getAll()
    {
        return $this->model->get();
    }
    public function selectData()
    {
        return $this->model->selectCustomData();
    }
}
