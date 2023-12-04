<?php


namespace App\Repositories\Impl;


use App\Models\Department;
use App\Repositories\DepartmentInterface;
use Illuminate\Support\Collection;

class DepartmentRepository extends MasterRepository implements DepartmentInterface
{
    protected $model;

    public function __construct(Department $model)
    {
        parent::__construct($model);
    }


}
