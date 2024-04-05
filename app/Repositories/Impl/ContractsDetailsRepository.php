<?php

namespace App\Repositories\Impl;

use App\Models\ContractsDetail;
use App\Repositories\ContractsDetailsInterface;
use Illuminate\Support\Collection;

class ContractsDetailsRepository extends MasterRepository implements ContractsDetailsInterface

{
    protected $model;
    public function __construct(ContractsDetail $model)
    {
        parent::__construct($model);
    }
    public function getAll()
    {
        return $this->model->get();
    }
}
