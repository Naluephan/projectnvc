<?php

namespace App\Repositories\Impl;

use App\Models\ContractsChange;
use App\Repositories\ContractsChangeInterface;
use Illuminate\Support\Collection;

class ContractsChangeRepository extends MasterRepository implements ContractsChangeInterface

{
    protected $model;
    public function __construct(ContractsChange $model)
    {
        parent::__construct($model);
    }
    public function getAll()
    {
        return $this->model->get();
    }
}
