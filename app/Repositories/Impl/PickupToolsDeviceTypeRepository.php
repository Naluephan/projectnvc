<?php


namespace App\Repositories\Impl;

use App\Models\PickupToolsDeviceType;
use App\Repositories\PickupToolsDeviceTypeInterface;
use Illuminate\Support\Collection;

class PickupToolsDeviceTypeRepository extends BaseRepository implements PickupToolsDeviceTypeInterface
{
    protected $model;

    public function __construct(PickupToolsDeviceType $model)
    {
        parent::__construct($model);
    }

    public function getAll($params)
    {
        return $this->model->get();
    }

}
