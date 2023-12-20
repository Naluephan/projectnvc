<?php


namespace App\Repositories\Impl;


use App\Models\TasEmployees;
use App\Repositories\TasEmployeeInterface;
use Illuminate\Support\Collection;

class TasEmployeeRepository extends MasterRepository implements TasEmployeeInterface
{
    protected $model;

    public function __construct(TasEmployees $model)
    {
        parent::__construct($model);
    }

    
   
}
