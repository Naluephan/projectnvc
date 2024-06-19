<?php


namespace App\Repositories\Impl;

use App\Models\AssetsAndSupplyCategories;
use App\Repositories\PickupToolsDeviceTypeInterface;
use Illuminate\Support\Collection;

class PickupToolsDeviceTypeRepository extends BaseRepository implements PickupToolsDeviceTypeInterface
{
    protected $model;

    public function __construct(AssetsAndSupplyCategories $model)
    {
        parent::__construct($model);
    }

    public function all(): Collection
    {
        return $this->model
            ->orderBy('id', 'asc')
            ->get();
    }


    public function findById($id)
    {
        $lead =  $this->model
            ->select('*')
            ->where('id', '=', $id)->first();
        return $lead;
    }
}
