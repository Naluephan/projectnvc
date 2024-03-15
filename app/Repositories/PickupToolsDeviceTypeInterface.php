<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface PickupToolsDeviceTypeInterface extends BaseInterface
{
    public function getAll($params);

}
