<?php

namespace App\Repositories\Impl;

use App\Models\Location;
use App\Repositories\LocationInterface;
use Illuminate\Support\Collection;

class LocationRepository extends BaseRepository implements LocationInterface
{
    protected $model;

    public function __construct(Location $model)
    {
        parent::__construct($model);
    }
    
    public function getLocation($id)
    {
        return $this->model
        ->where('building_location_id','=',$id)
        ->with('location')
        ->get();
    }
    public function createMultiple(array $data)
{
    return Location::insert($data);
}
}