<?php


namespace App\Repositories\Impl;


use App\Models\BuildingLocation;
use App\Repositories\BuildingLocationInterface;
use Illuminate\Support\Collection;

class BuildingLocationRepository extends MasterRepository implements BuildingLocationInterface
{
    protected $model;

    public function __construct(BuildingLocation $model)
    {
        parent::__construct($model);
    }
public function getAll(){
    return $this->model
    ->with('places')
    ->get();
}


}
