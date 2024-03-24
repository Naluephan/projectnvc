<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface PickupToolsInterface extends BaseInterface
{
    public function allList($params);

    public function createCondition($params);
    public function deleteCondition($params);
    public function detailDepartmentById($params);
}
