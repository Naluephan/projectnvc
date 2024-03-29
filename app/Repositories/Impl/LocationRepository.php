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
    public function getAll($params = null): Collection
    {

        return $this->model
            ->where(function ($q) use ($params) {
                if (isset($params['searchValue'])) {
                    $q->where('floor', 'like', '%' . $params['searchValue'] . '%');
                    $q->orWhere('place_name', 'like', '%' . $params['searchValue'] . '%');
                }
            })
            ->with('location')
            ->get();
    }
    public function paginate($params): Collection
    {
        return $this->model
        ->where(function ($q) use ($params) {
            if (isset($params['searchValue'])) {
                $q->where('floor', 'like', '%' . $params['searchValue'] . '%');
                $q->orWhere('place_name', 'like', '%' . $params['searchValue'] . '%');
            }
        })
        ->with('location')
            ->select('*')
            ->skip($params['start'])
            ->take($params['rowperpage'])
            ->get();
    }

    public function all(): Collection
    {
        return $this->model
            ->get();
    }
    public function deleteNotIn($ids, $location_id)
    {
        $query = $this->model->where('location_id', $location_id);

        if ($ids !== null) {
            $query->whereNotIn('id', $ids);
        }

        return $query->delete();
    }
}