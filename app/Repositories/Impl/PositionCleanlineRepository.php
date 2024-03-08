<?php


namespace App\Repositories\Impl;


use App\Models\PositionCleanLine;
use App\Repositories\PositionCleanlineInterface;
use Illuminate\Support\Collection;

class PositionCleanlineRepository extends MasterRepository implements PositionCleanlineInterface
{
    protected $model;

    public function __construct(PositionCleanLine $model)
    {
        parent::__construct($model);
    }
    
    public function getAll(){
        return $this->model->get();
    }
    
   
}
