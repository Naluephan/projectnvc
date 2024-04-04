<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface PickupToolsEmployeeInterface extends BaseInterface
{
    public function pickupToolsList($params);
}
