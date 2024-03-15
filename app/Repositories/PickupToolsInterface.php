<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface PickupToolsInterface extends BaseInterface
{
    public function showDetailBydepartment($params);
    public function allList($params);
    public function createCondition($params);
}
